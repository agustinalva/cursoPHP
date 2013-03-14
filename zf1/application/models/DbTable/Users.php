<?php
class Application_Model_DbTable_Users extends Zend_Db_Table_Abstract
{
    protected $_name = 'users';
    public function getUser($id)
        {
        $id = (int)$id;
        $row = $this->fetchRow('id = ' . $id);
        if (!$row) {
        throw new Exception("Could not find row $id");
        }
        return $row->toArray();
        }
    public function addUser($artist, $title)
        {
        $data = array(
        'artist' => $artist,
        'title' => $title,
        );
        $this->insert($data);
        }
    public function updateAlbum($id, $artist, $title)
        {
        $data = array(
        'artist' => $artist,
        'title' => $title,
        );
        $this->update($data, 'id = '. (int)$id);
        }
    public function deleteAlbum($id)
        {
        $this->delete('id =' . (int)$id);
        }
}