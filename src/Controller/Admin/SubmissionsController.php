<?php

namespace Surveys\Controller\Admin;

use Cake\Event\Event;
use Croogo\Core\Controller\Admin\AppController as CroogoController;

/**
 * Submissions Controller
 *
 * @property \Surveys\Model\Table\SubmissionsTable $Submissions
 */
class SubmissionsController extends CroogoController
{

    public function initialize()
    {
        parent::initialize();

        $this->Crud->config('actions.index', [
            'searchFields' => ['survey_id', 'user_id'],
        ]);

        $this->_setupPrg();
    }

    /**
     * Index method
     */
    public function index()
    {
        $this->Crud->listener('relatedModels')->relatedModels(true);

        return $this->Crud->execute();
    }

    /**
     * View method
     */
    public function view($id = null)
    {
        $this->Crud->listener('relatedModels')->relatedModels(true);
        $this->Crud->on('beforeFind', function(Event $event) {
            $event->subject()->query
                ->contain(['Users', 'SubmissionDetails', 'SubmissionDetails.Questions']);
        });
        return $this->Crud->execute();
    }

    /**
     * Add method
     */
    public function add()
    {
        return $this->Crud->execute();
    }

    /**
     * Edit method
     */
    public function edit($id = null)
    {
        return $this->Crud->execute();
    }

    /**
     * Delete method
     */
    public function delete($id = null)
    {
        return $this->Crud->execute();
    }

}
