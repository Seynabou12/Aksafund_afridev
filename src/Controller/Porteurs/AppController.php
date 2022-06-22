<?php
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
namespace App\Controller\Porteurs;

use App\Controller\AppController as app;
use Cake\Event\Event;
/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends app
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();
        $this->loadModel('Users');

        /*
         * Enable the following component for recommended CakePHP security settings.
         * see https://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
    }
    public function beforeFilter($event)
    {
        $static = new StaticsController();
        $_sidebar = json_decode(json_encode($static->sidebar()));
        $current =$this->Auth->user()[0];
        $utilisateur = $this->Users->get($current->id);
        if($current != null){
            if($current->roles[0]->profil->id == 2){
                $this->set(compact('_sidebar','utilisateur','current'));
            }
            else{
                return $this->redirect($this->referer());
            }

        }
        else{
            $this->Flash->error('Vous n\'êtes pas autorisé à cette dans cet espace');
            return $this->redirect($this->referer());
        }
    }
    protected function savePhoto($index,$dossier)
    {
        $urlImg = WWW_ROOT.'img' .DS. $dossier .DS;
        # code...
        $ext = substr(strrchr($index['name'],'.'),1);
        $name = trim(strtolower($this->token(10)).'.'.$ext);
        $url = $urlImg.$name;
        //dd($url);
        $nomphoto = $dossier.'/'.$name;
        $verif = $this->upload($index, $url,false,['jpg','jpeg','png','gif']);
        if($verif== true){

            return $nomphoto;
        }
        else {
            return false;
        }


    }
    protected function token($taille)
    {
        $alphabet = "0123456789azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN";
        $code = substr(str_shuffle(str_repeat($alphabet, 50)),0, $taille);
        return $code;
    }
    protected function upload($index,$destination,$maxsize=FALSE,$extensions=FALSE)
    {
        //Test1: fichier correctement uploadé
            if (!isset($index) OR $index['error'] > 0) return FALSE;
        //Test2: taille limite
            //if ($maxsize !== FALSE AND $index['size'] > $maxsize) return FALSE;
        //Test3: extension
            $ext = substr(strrchr($index['name'],'.'),1);
            if ($extensions !== FALSE AND !in_array($ext,$extensions)) return FALSE;
        //Déplacement
        return move_uploaded_file($index['tmp_name'],$destination);
    }
}
