const request   = require('request');
const cheerio   = require('cheerio');
const validUrl  = require('valid-url');
const Pusher    = require('pusher');

var pusher = new Pusher({
    appId: '',
    key: '',
    secret: '',
    cluster: 'eu',
    encrypted: true
});

var appRouter = function (app) {
    app.put('/api/pusher', function(req, res) {
        var data = req.body;
        if (typeof data[0]['user_hash'] !== 'undefined') {
            pusher.trigger(data[0]['user_hash'], 'get', data);
            res.status(200).send({ message: "OK" });
        }else{
            res.status(404).send({ message: "ERROR" });
        }
    });
    app.put('/api/getJsonProductList', function(req, res) {
        var link = req.body.link;
        console.log(link);
        if(!validUrl.isUri(link)) return res.status(400).send({ message: link });
        var options = {
            url: link,
            followAllRedirects: true,
            headers: {
              'User-Agent': 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36'
            }
        };
        var products = [];
        if(link.includes("olx")){
            res.status(200);
            res.header("Content-Type",'application/json');
            request(options, function (error, response, html) {
                console.log(getFormattedDate() + " : " + response.statusCode + " : " + link);
                if (!error && response.statusCode === 200) {
                    var $ = cheerio.load(html);
                    if(!$('table#offers_table').hasClass('no-results-table')){
                        $('table#offers_table tr.wrap td.offer').each(function(i, element){
                            products.push(
                                { 
                                    ad_id: $(this).find('table').eq(0).attr('data-id'),
                                    ad_img_src: $(this).find('img').eq(0).attr('src'),
                                    ad_link:   $(this).find('a').eq(0).attr('href').trim(),
                                    ad_title:  $(this).find('strong').eq(0).text().trim(),
                                    ad_price:  $(this).find('p.price strong').eq(0).text().trim(),
                                    ad_city:   $(this).find('small.breadcrumb span').eq(0).text().trim()
                                }
                            );
                        });
                        res.json(products);
                    }
                }
            });
        }else if(link.includes("allegro")){
            res.status(200);
            res.header("Content-Type",'application/json');
            request(options, function (error, response, html) {
                console.log(getFormattedDate() + " : " + response.statusCode + " : " + link);
                if (!error && response.statusCode === 200) {
                    var $ = cheerio.load(html);
                    var str = $('#opbox-listing').next().html();
                    var data = str.match(new RegExp("window.__listing_StoreState = (.*);"));
                    var json = JSON.parse(data[1]);
                    $(json.items.itemsGroups).each(function(i, element){
                        if(!element.sponsored){
                            $(element.items).each(function(i, e){
                                products.push(
                                    { 
                                        ad_id: e.id,
                                        ad_img_src: e.photos[0].medium,
                                        ad_link:   e.url,
                                        ad_title:  e.title.text,
                                        ad_price:  e.price.normal.amount + " zł",
                                        ad_city:   e.location
                                    }
                                );
                            });
                        }
                    });
                    res.json(products);
                }
            });
        }else if(link.includes("otomoto")){
            res.status(200);
            res.header("Content-Type",'application/json');
            request(options, function (error, response, html) {
                console.log(getFormattedDate() + " : " + response.statusCode + " : " + link);
                if (!error && response.statusCode === 200) {
                    var $ = cheerio.load(html);
                    $('article.offer-item').each(function(i, element){
                        products.push(
                            { 
                                ad_id: $(this).find('a').eq(0).attr('data-ad-id'),
                                ad_img_src: $(this).find('a').eq(0).attr('data-bg'),
                                ad_link:   $(this).find('a').eq(0).attr('href').trim(),
                                ad_title:  $(this).find('a').eq(0).attr('title').trim(),
                                ad_price:  $(this).find('.offer-price__number').eq(0).text().trim(),
                                ad_city:   $(this).find('.offer-item__location h4').eq(0).text().trim()
                            }
                        );
                    });
                    res.json(products);
                }
            });
        }else if(link.includes("sprzedajemy")){
            res.status(200);
            res.header("Content-Type",'application/json');
            request(options, function (error, response, html) {
                console.log(getFormattedDate() + " : " + response.statusCode + " : " + link);
                if (!error && response.statusCode === 200) {
                    var $ = cheerio.load(html);
                    $('section.offers ul.normal li article.element').each(function(i, element){
                        if($(this).parent('li').attr('id').includes("offer-")){
                            products.push(
                                { 
                                    ad_id:  $(this).parent('li').attr('id').replace("offer-", ""),
                                    ad_img_src: $(this).find('ul li.photo img').eq(0).attr('src'),
                                    ad_link:   "https://sprzedajemy.pl" + $(this).find('ul li.details .title a').eq(0).attr('href'),
                                    ad_title:  $(this).find('ul li.details .title a').eq(0).text(),
                                    ad_price:  $(this).find('ul li.details .pricing span.price').eq(0).text().trim(),
                                    ad_city:   $(this).find('ul li.details .city').eq(0).text().trim()
                                }
                            );
                        }
                    });
                    res.json(products);
                }
            });
        }else if(link.includes("travelplanet")){
            res.status(200);
            res.header("Content-Type",'application/json');
            request(options, function (error, response, html) {
                console.log(getFormattedDate() + " : " + response.statusCode + " : " + link);
                if (!error && response.statusCode === 200) {
                    var $ = cheerio.load(html);
                    $('div#result--list section.offer-item').each(function(i, element){
                        if(i<10){
                            products.push(
                                { 
                                    ad_id: $(this).attr('data-id'),
                                    ad_img_src: $(this).find('img').eq(0).attr('src'),
                                    ad_link: $(this).find('a').eq(0).attr('href').trim(),
                                    ad_title:  $(this).find('.oi-h-l-txt span').eq(0).text().trim(),
                                }
                            );
                        }
                    });
                    res.json(products);
                }
            });
        }else{
            res.status(400).send({ message: "Unsupported Page" });
        }
    });
};
function getFormattedDate() {
    var date = new Date();
    var str = date.getFullYear() + "-" + (date.getMonth() + 1) + "-" + date.getDate() + " " +  date.getHours() + ":" + date.getMinutes() + ":" + date.getSeconds();
    return str;
}
module.exports = appRouter;