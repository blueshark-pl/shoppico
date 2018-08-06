/* 
 * @author  - Y2hyaXM=
 * @url     - https://github.com/Y2hyaXM/grab-bargains
 * @license - Apache License 2.0
 */
const express       = require("express");
const bodyParser    = require("body-parser");
const routes        = require("./routes/routes.js");

const app = express();

app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: true }));

routes(app);

var server = app.listen(3232, function () {
    console.log("app running on port.", server.address().port);
});