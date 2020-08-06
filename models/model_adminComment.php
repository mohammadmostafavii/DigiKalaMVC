<?php

class model_adminComment extends Model
{

    function __construct()
    {
        parent::__construct();
    }

    function getComments()
    {
        $sql = "SELECT * FROM tbl_comment ORDER BY id desc";
        $comments = $this->doSelect($sql);
        return $comments;
    }

    function confirm($ids = [])
    {
        $ids = implode(',', $ids);
        $sql = "UPDATE tbl_comment SET confirm = 1 WHERE id IN (" . $ids . ")";
        $this->doQuery($sql);
    }

    function unConfirm($ids = [])
    {
        $ids = implode(',', $ids);
        $sql = "UPDATE tbl_comment SET confirm = 0 WHERE id IN (" . $ids . ")";
        $this->doQuery($sql);
    }

    function delete($ids = [])
    {
        $ids = implode(',', $ids);
        $sql = "DELETE FROM tbl_comment WHERE id IN (" . $ids . ")";
        $this->doQuery($sql);
    }

    function show($commentId)
    {
        $sql = "SELECT * FROM tbl_comment WHERE id = ?";
        $comment = $this->doSelect($sql, [$commentId], 0);
        return $comment;
    }

    function edit($commentId, $data=[])
    {
        $sql = "UPDATE tbl_comment SET title=?, positive=?, negative=?, body=?";
        $this->doQuery($sql, [$data['title'], $data['positive'], $data['negative'], $data['body']]);
    }

}