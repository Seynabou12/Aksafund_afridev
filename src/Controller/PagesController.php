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
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\ORM\TableRegistry;
use Cake\View\Exception\MissingTemplateException;

/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link https://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController
{

    /**
     * Displays a view
     *
     * @param array ...$path Path segments.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Http\Exception\ForbiddenException When a directory traversal attempt.
     * @throws \Cake\Http\Exception\NotFoundException When the view file could not
     *   be found or \Cake\View\Exception\MissingTemplateException in debug mode.
     */
    public function display(...$path)
    {
        $this->loadModel('Campagnes');
        
        $campagnes = $this->Campagnes->find('all',[
            'contain'=>['Categorys.Typecategorys','Users','Fichiers','Participations' => function ($query) {
                return $query->select(['Participations.campagne_id','somme' => $query->func()->sum('Participations.montant')])->where(['etatpaiement'=>'completed'])->group('Participations.campagne_id');}],
                'conditions'=>['Campagnes.status !='=>0],
                'order'=>['Campagnes.id desc']
        ])->toArray();

        $projets = $this->Campagnes->find('all',[
            'contain'=>['Categorys.Typecategorys','Users','Fichiers'],
            'conditions'=>['Typecategorys.name'=>'Projets']
        ])->toArray();

        $parametres = TableRegistry::get('Parametres');
        $query = $parametres->find('all', [
        ]);
        $parametre = $query->first();

        $sections = TableRegistry::get('Sections');
        $query = $sections->find('all', [
        ]);
        $section = $query->toArray();

        $sliders = TableRegistry::get('Sliders');
        $query = $sliders->find('all', [
        ]);
        $slider = $query->toArray();

        $images = TableRegistry::get('Images');
        $query = $images->find('all', [
        ]);
        $image = $query->toArray();

        $types = TableRegistry::get('Typecategorys');
        $query = $types->find('all', []);
        $type = $query->toArray();

        $reseaux = TableRegistry::get('Reseaux');
        $query = $reseaux->find('all', []);
        $reseau = $query->toArray();
        
        $causes = $this->Campagnes->find('all',[
            'contain'=>['Categorys.Typecategorys','Users','Fichiers'],
            // 'conditions'=>['Typecategorys.name'=>'Causes']
        ])->toArray();
        $count = count($path);
        if (!$count) {
            return $this->redirect('/');
        }
        if (in_array('..', $path, true) || in_array('.', $path, true)) {
            throw new ForbiddenException();
        }
        $page = $subpage = null;

        if (!empty($path[0])) {
            $page = $path[0];
        }
        if (!empty($path[1])) {
            $subpage = $path[1];
        }
        $this->set(compact('page', 'subpage','projets','causes','campagnes', 'parametre', 'slider', 'image', 'section', 'type', 'reseau'));

        try {
            $this->render(implode('/', $path));
        } catch (MissingTemplateException $exception) {
            if (Configure::read('debug')) {
                throw $exception;
            }
            throw new NotFoundException();
        }
    }
    
}
