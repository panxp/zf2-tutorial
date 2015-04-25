<?php
namespace Album\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class AlbumController extends AbstractActionController
{
    protected $albumTable;

    public function indexAction()
    {
        return new ViewModel(array(
            'albums' => $this->getAlbumTable()->fetchAll(),
        ));
    }

    public function addAction()

    {
        echo __line__;
    }

    public function editAction()
    {
    }

    public function deleteAction()
    {
        $id = (int)$this->params()->fromRoute('id', 0);
        $objectManager = $this->getServiceLocator()->get('Album\Model\AlbumTable');
        $objectManager->deleteAlbum($id);
    }

    public function getAlbumTable()
    {
        if (!$this->albumTable) {
            $sm = $this->getServiceLocator();
            $this->albumTable = $sm->get('Album\Model\AlbumTable');
        }
        return $this->albumTable;
    }
}
