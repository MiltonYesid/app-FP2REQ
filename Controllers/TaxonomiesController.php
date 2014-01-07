<?php
class TaxonomiesController
{
    function createTaxonomy($idAnalyst,$name,$description)
    {
        include_once  '../../BusinessObjects/Taxonomy.php';
        include_once  '../../DataAccess/TaxonomyDAO.php';
        $taxonomyDAO  = new TaxonomyDAO();
        $taxonomy     = new Taxonomy();
        $taxonomy     ->setId_Analyst($idAnalyst);
        $taxonomy     ->setName($name);
        $taxonomy     ->setDescription($description);
        $taxonomyDAO  ->saveTaxonomy($taxonomy);
    }
    function createItem($idTaxonomy,$content)
    {
        include_once  '../../BusinessObjects/TaxonomyItem.php';
        include_once  '../../DataAccess/TaxonomyDAO.php';
        $taxonomyDAO  = new TaxonomyDAO();
        $item         = new TaxonomyItem();
        $item         ->setId_Taxonomy($idTaxonomy);
        $item         ->setContent($content);
        $taxonomyDAO  ->addTaxonomySpec($item);
    }
    function getTaxonomies($idAnalyst)
    {
        include_once  '../../BusinessObjects/Taxonomy.php';
        include_once  '../../DataAccess/TaxonomyDAO.php';
        $taxonomyDAO  = new TaxonomyDAO();
        $taxonomies   = $taxonomyDAO  ->listTaxonomies($idAnalyst);
        return $taxonomies;
    }
    function getTaxonomy($idTaxonomy)
    {
        include_once  '../../BusinessObjects/Taxonomy.php';
        include_once  '../../DataAccess/TaxonomyDAO.php';
        $taxonomyDAO  = new TaxonomyDAO();
        $taxonomy     = $taxonomyDAO  ->getTaxonomy($idTaxonomy);
        return $taxonomy;
    }
    function getItem($idItem)
    {
        include_once  '../../BusinessObjects/TaxonomyItem.php';
        include_once  '../../DataAccess/TaxonomyDAO.php';
        $taxonomyDAO  = new TaxonomyDAO();
        $item         = $taxonomyDAO ->getItem($idItem);
        return        $item;
    }
    function updateTaxonomy($idTaxonomy,$name,$description)
    {
        include_once  '../../BusinessObjects/Taxonomy.php';
        include_once  '../../DataAccess/TaxonomyDAO.php';
        $taxonomyDAO  = new TaxonomyDAO();
        $taxonomy     = new Taxonomy();
        $taxonomy     ->setName($name);
        $taxonomy     ->setId_taxonomy($idTaxonomy);
        $taxonomy     ->setDescription($description);
        $taxonomyDAO  ->editTaxonomy($taxonomy);
    }
    function updateItem($idTaxonomySpec,$content)
    {
        include_once  '../../BusinessObjects/TaxonomyItem.php';
        include_once  '../../DataAccess/TaxonomyDAO.php';
        $taxonomyDAO  = new TaxonomyDAO();
        $item         = new TaxonomyItem();
        $item         ->setContent($content);
        $item         ->setId_taxonomyItem($idTaxonomySpec);
        $taxonomyDAO  ->editTaxonomySpec($item);
    }
    function deleteTaxonomy($idTaxonomy)
    {
        include_once  '../../DataAccess/TaxonomyDAO.php';
        $taxonomyDAO  = new TaxonomyDAO();
        $taxonomyDAO  ->deleteTaxonomy($idTaxonomy);
    }
    function deleteItem($idItem)
    {
        include_once  '../../DataAccess/TaxonomyDAO.php';
        $taxonomyDAO  = new TaxonomyDAO();
        $taxonomyDAO  ->deleteTaxonomySpec($idItem);
    }
}