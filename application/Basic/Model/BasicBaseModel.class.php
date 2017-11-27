<?php
/**
 * drunk , fix later
 * Created by Magic.
 * User: jiaying
 * Datetime: 28/11/2017 00:20
 */

namespace Basic\Model;


abstract class BasicBaseModel
{
    abstract protected function getTableName();

    abstract protected function getPrimaryId();

    protected function getDao() {
        return M($this->getTableName());
    }

    public function insertData($data) {
        if (empty($data)) return 0;
        return $this->getDao()->add($data);
    }

    public function delById($id) {
        $key = $this->getPrimaryId();
        if ($key == null) {
            return 0;
        }
        $where = array(
            $key => $id
        );
        return $this->getDao()->where($where)->limit('1')->delete();
    }

    public function getById($id, $field = array()) {
        $key = $this->getPrimaryId();
        if ($key == null || empty($id)) {
            return null;
        }
        $where = array(
            $key => $id
        );
        return $this->getDao()->field($field)->where($where)->find();
    }

    public function updateById($id, $data) {
        $key = $this->getPrimaryId();
        if ($key == null || empty($id) || empty($data)) {
            return null;
        }
        $where = array(
            $key => $id
        );
        return $this->getDao()->where($where)->data($data)->save();
    }

    // for query

    public function queryOne($where, $field = array()) {
        if (empty($where)) {
            return null;
        }
        return $this->getDao()->field($field)->where($where)->find();
    }

    public function queryAll($where, $field = array(), $order = array()) {
        if (empty($where)) {
            return array();
        }
        if (empty($order)) {
            return $this->getDao()->field($field)->where($where)->select();
        } else {
            return $this->getDao()->field($field)->where($where)->order($order)->select();
        }
    }

    public function queryData($query, $field = array()) {
        $where = array();
        $dao = $this->getDao();
        foreach ($query as $k => $v) {
            $where[$k] = $query[$k];
            if ($k == "_logic" || $k == "_complex") {
                $where[$k] = $query[$k];
            }
        }

        $dao = $dao->field($field)->where($where);

        if (!empty($query['group'])) {
            $dao->group($query['group']);
        }

        if (!empty($query['order'])) {
            $dao->order($query['order']);
        }

        if (!empty($query['limit'])) {
            $dao->limit($query['limit']);
        }
        $res = $dao->select();
        return $res;
    }
}