<?php
function public_nav_main_bootstrap() {
    $partial = array('common/menu-partial.phtml', 'default');
    $nav = public_nav_main();  // this looks like $this->navigation()->menu() from Zend
    $nav->setPartial($partial);
    return $nav->render();
}

function simple_nav(){
    $page = get_current_record('SimplePagesPage');

    $links = simple_pages_get_links_for_children_pages();
    if(!$links):
        $links = simple_pages_get_links_for_children_pages($page->parent_id);
    endif;

    $html="<ul class='simple-nav'>";
    foreach($links as $link):
        $html .= "<li><a href='".$link['uri']."'>".$link['label']."</a></li>";
    endforeach;
    $html .="</ul>";

    return $html;
}

function libis_get_simple_page_content($title) {
    $page = get_record('SimplePagesPage', array('title' => $title));
    if($page):
        return $page->text;
    else:
        return false;
    endif;
}

function get_related($relations){
  $types = array("Lecture page",
            "Archival folder",
            "Manuscript collection",
            "Participants list",
            "Person",
            "Lecture event",
            "Publication",
            "Photograph",
            "Lecture announcement"
          );
    $element = get_db()->getTable('Element')->findByElementSetNameAndElementName('Item Type Metadata', 'CA');
    $id = $element->id;
    $items = "";
    foreach($relations as $relation):
      $items = get_records(
        'Item',
        array(
            'advanced' => array(
                array(
                    'element_id' => $id,
                    'type' => 'is exactly',
                    'terms' => $relation,
                )
            )
        )
      );
    endforeach;

    if(sizeof($items)):
      return related_html($items);
    else:
      return false;
    endif;
}

function related_html($items){
  $html = "";
  $relation_array = array();

  foreach($items as $item):
    //var_dump($item[0]);die();
    $item = $item[0];

    $relation_array[metadata($item,'item_type_name')]["links"][] = link_to_item(metadata($item, array("Dublin Core","Title")),array(),"show",$item);
    $relation_array[metadata($item,'item_type_name')]["records"][] = $item;
  endforeach;

  return $relation_array;
}
