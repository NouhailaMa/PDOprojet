<?php

interface IDao {
    
    function create($o);
    function delete($o);
    function update($o);
    function findall();
    function findById($id);
}
