<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Stock_model extends CI_Model
{

    public $table = 'stock';
    public $id = 'kdbar';
    public $order = 'ASC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->select('kdbar, kdurl, nama, deskripsi, kdgol2, format(hjual,0,"id") as hjual, gambar');
        $this->db->where('kdbar', $id);
        return $this->db->get($this->table)->row();
    }

    // get data by kodeurl
    function get_by_kodeurl($id)
    {
        $this->db->select('kdbar, kdurl, nama, deskripsi, fitur, kdgol2, format(hjual,0,"id") as hjual,'.
        'hpromo, format(hpromo,0,"id") as hpromof, kriteria, gambar');
        $this->db->where('kdurl', $id);
        return $this->db->get($this->table)->row();
    }

    // get data by category
    function get_by_category($limit, $start = 0, $code)
    {
        $this->db->select('kdbar, kdurl, nama, deskripsi, format(hjual,0,"de") as hjual, gambar');
        // $this->db->where('kdgol2', $code);
        $this->db->like('kdgol', $code);
        $this->db->or_like('kdgol2', $code);
        $this->db->or_like('kdgol3', $code);
	    $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // get data by food category
    function get_by_food_category($limit = 8, $start = 0, $tag)
    {
        $this->db->select('kdbar, kdurl, nama, deskripsi, format(hjual,0,"de") as hjual, gambar');
        // $this->db->where('kdgol2', $code);
        $this->db->like('tag', $tag);
	    $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // get data by brand
    function get_by_brand($limit = 8, $start = 0, $brand)
    {
        $this->db->where($this->merk, $brand);
	    $this->db->limit($limit, $start);
        return $this->db->get($this->table)->row();
    }

    // get related product
    function get_related($kode, $kdbar)
    {
        $this->db->select('kdbar, kdurl, nama, deskripsi, format(hjual,0,"id") as hjual, gambar')
            ->from('stock')
            ->where('kdgol2', $kode)
            ->where('kdbar !=', $kdbar)
            ->order_by('kdbar', 'ASC');
        return $this->db->get()->result();
    }

    // get new products
    function get_new_products($limit = 8, $start = 0)
    {
        $this->db->select('kdbar, kdurl, nama, deskripsi, format(hjual,0,"id") as hjual, gambar')
            ->from('stock')
            ->where('kriteria', 'N')
            ->order_by('kdbar', 'ASC');
        $this->db->limit($limit, $start);
        return $this->db->get()->result();
    }
    
    // get total new products
    function total_new_products() {
        $this->db->where('kriteria', 'N');
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get promotion product
    function get_promotion($limit = 8, $start = 0)
    {
        $this->db->select('kdbar, kdurl, nama, deskripsi, format(hjual,0,"id") as hjual, format(hpromo,0,"id") as hpromo, ROUND(100-hpromo*100/hjual,1) as diskon, gambar')
            ->from('stock')
            ->where('kriteria', 'P')
            // ->where('kdbar !=', $kdbar)
            ->order_by('kdbar', 'ASC');
        $this->db->limit($limit, $start);
        return $this->db->get()->result();
    }
    
    // get total promotions
    function total_promotions() {
        $this->db->where('kriteria', 'P');
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get best seller product
    function get_best_seller($limit = 8, $start = 0)
    {
        $this->db->select('kdbar, kdurl, nama, deskripsi, format(hjual,0,"id") as hjual, gambar')
            ->from('stock')
            ->where('kriteria', 'B')
            ->order_by('kdbar', 'ASC');
        $this->db->limit($limit, $start);
        return $this->db->get()->result();
    }
    
    // get total best seller
    function total_best_seller() {
        $this->db->where('kriteria', 'B');
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get random product
    function get_random_products($kode, $kdbar)
    {
        $this->db->select('kdbar, kdurl, nama, deskripsi, format(hjual,0,"id") as hjual, gambar')
            ->from('stock')
            ->where('kdgol2', $kode)
            ->where('kdbar !=', $kdbar)
            ->order_by('kdbar', 'ASC');
        return $this->db->get()->result();
    }
    
    // get total rows
    function total_rows($q = NULL, $b = NULL, $p1 = 0, $p2 = 0) {
        
        if ($q) {
            $this->db
            ->group_start()
            ->or_like(['kdbar'=> $q, 'nama'=> $q, 'kdgol'=> $q, 'kdgol2'=> $q, 'kdgol3'=> $q, 'tag'=> $q])
            ->group_end();
        }
        
        // with price condition
        if ($p2) {
            if ($p2 > 0) {
                // $this->db->where('hjual between '.$p1.' and '.$p2);
                $this->db->where('hjual >=', $p1);
                $this->db->where('hjual <=', $p2);
            }
        } elseif ($p1) {
            $this->db->where('hjual > '.$p1);
        }

        // with brand condition
        if ($b) {
            if ($b !== 'OTHER') {
                $this->db->where('merk', $b);
            } else {
                $this->db->where('merk not in (select name from brands)');
            }
        }
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    function get_limit_data($limit, $start = 0, $q = NULL, $b = NULL, $p1 = 0, $p2 = 0) {
        
        $qry = $this->db->select('kdbar, kdurl, nama, deskripsi, format(hjual,0,"id") as hjual, gambar');
        
        if ($q) {
            $qry->group_start()
            ->or_like(['kdbar'=> $q, 'nama'=> $q, 'kdgol'=> $q, 'kdgol2'=> $q, 'kdgol3'=> $q])
            ->group_end();
        }
        
        // with price condition
        if ($p2) {
            if ($p2 > 0) {
                // $this->db->where('hjual between '.$p1.' and '.$p2);
                $this->db->where('hjual >=', $p1);
                $this->db->where('hjual <=', $p2);
            }
        } elseif ($p1) {
            $this->db->where('hjual > '.$p1);
        }

        // with brand condition
        if ($b) {
            if ($b !== 'OTHER') {
                $this->db->where('merk', $b);
            } else {
                $this->db->where('merk not in (select name from brands)');
            }
        }

        if ($p1) {
            $this->db->order_by('hjual', $this->order);
        } else {
            $this->db->order_by($this->id, $this->order);
        }
	    $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file Stock_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-05-05 15:06:53 */
/* http://harviacode.com */
