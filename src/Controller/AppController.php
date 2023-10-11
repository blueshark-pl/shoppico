<?php
declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\I18n\Number;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/4/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('FormProtection');`
     *
     * @return void
     */
    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');

        /*
         * Enable the following component for recommended CakePHP form protection settings.
         * see https://book.cakephp.org/4/en/controllers/components/form-protection.html
         */
        //$this->loadComponent('FormProtection');
        if($this->request->getAttribute('identity')){
            $this->loadModel('Filters');
            $this->loadModel('FilterDetails');
            $findOpts = [
                'limit' => '100',
                'order' => ['Filters.created' => 'DESC'],
                'conditions' => [
                    'Filters.user_id' => $this->request->getAttribute('identity')->id,
                    'Filters.removed'           => 0
                ]
            ];
            $numberOfNewFilterDetails = $this->FilterDetails->find('all', [
                'conditions' => [
                    'Filters.user_id'                       => $this->request->getAttribute('identity')->id,
                    'Filters.removed'                       => 0,
                    'FilterDetails.notification_status'     => 0
                ],
                'contain' => [
                    'Filters'
                ]
            ])->count();
            $filtersManagment = $this->Filters->find('all', $findOpts)->all();
            $this->set(compact('filtersManagment', 'numberOfNewFilterDetails'));
            $this->loadModel('Subscriptions');
            $subscriptions = $this->Subscriptions->find('all', ['order' => ['Subscriptions.brutto' => 'ASC'], 'conditions' => ['Subscriptions.active' => 1, 'Subscriptions.users_email' => '', 'Subscriptions.removed' => 0]]);
            $this->set(compact('subscriptions'));

            $this->loadModel('Filters');
            $filterForm = $this->Filters->newEmptyEntity();
            $this->set(compact('filterForm'));
        }
        
    }

    public function checkPortalURL($url){
        # WYJĄTKI
        # OLX
        if (strpos($url, 'www.m.olx') !== false) { $url = str_replace("m.olx","olx", $url);}
        if (strpos($url, 'm.olx') !== false) { $url = str_replace("m.olx","www.olx", $url);}
        if (strpos($url, 'olx') !== false) { $url = str_replace(" ","-", $url);}
        
        return $url;
    }
    public function unicodes($sText){
        $aReplacePL = array(
            'ą' => '%C4%85',
            'ę' => '%C4%99',
            'ś' => '%C5%9B',
            'ć' => '%C4%87',
            'ó' => '%C3%B3', 
            'ń' => '%C5%84', 
            'ż' => '%C5%BC', 
            'ź' => '%C5%BA', 
            'ł' => '%C5%82',
            'Ą' => '%C4%85', 
            'Ę' => '%C4%99', 
            'Ś' => '%C5%9B', 
            'Ć' => '%C4%87',
            'Ó' => '%C3%B3',
            'Ń' => '%C5%84', 
            'Ż' => '%C5%BC', 
            'Ź' => '%C5%BA', 
            'Ł' => '%C5%82'
        );
        return str_replace(array_keys($aReplacePL), array_values($aReplacePL), $sText);
    }
    public function variety($number, $varietyFor1, $varietyFor234, $varietyForOthers) {
        if ($number == 1)
            return $varietyFor1;
        if ($number % 100 >= 10 && $number % 100 <= 20)
            return $varietyForOthers;
        if (in_array($number % 10, array(2, 3, 4)))
            return $varietyFor234;
        return $varietyForOthers;
    }
}
