<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     3.0.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\View\Helper;

use Cake\View\Helper;
use Cake\Utility\Text;
/**
 * Application View
 *
 * Your application's default view class
 *
 * @link https://book.cakephp.org/3.0/en/views.html#the-app-view
 */
class StatutHelper extends Helper
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading helpers.
     *
     * e.g. `$this->loadHelper('Html');`
     *
     * @return void
     */
    public function getStatut($statut){
        $msg = '';
        switch ($statut) {
            case 0 :
                # code...
                $msg = '<span class="badge badge-danger"><i class="fas fa-times-circle"></i> Inactif</span>';
                break;
            case 1:
                $msg = '<span class="badge badge-success"><i class="fas fa-check-circle"></i> Actif</span>';
                break;
            
            default:
                # code...
                $msg = '<span class="badge badge-warning"><i class="fas fa-check-circle"></i> Clôturée</span>';

                break;
        }
        return $msg;
    }
    public function getAnonyme($statut){
        $msg = '';
        switch ($statut) {
            case 0 :
                # code...
                $msg = '<span class="badge badge-danger"><i class="fas fa-times-circle"></i> Anonyme</span>';
                break;
        }
        return $msg;
    }
}
