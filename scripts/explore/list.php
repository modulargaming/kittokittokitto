<?php
        $LOCATION_LIST_LIST = array();
        $locations_list = new Area($db);
        $locations_list = $locations_list->findBy(array());

        foreach($locations_list as $location_list)
        {
                $LOCATION_LIST_LIST[] = array(
                  'id' => $location_list->getLocationId(),
                  'name' => $location_list->getLocationName(),
        	  'slug' => $location_list->getLocationSlug(),
       
	 );
        } // end Location list

        $renderer->assign('location_list',$LOCATION_LIST_LIST);
        $renderer->assign('location_available',(bool)sizeof($LOCATION_LIST_LIST));
        $renderer->display('explore/list.tpl');
?>

