<?php

class parse_rssjs {

  var $file;
  var $obj;

  function __construct($page = false){

    $this->file = $page;

  }

   function __destruct() {
      $this->file = NULL;
      $this->obj = NULL;
   }

  function fetch($url){

    #Don't want to fetch it yourself? Let us fetch it for you.
    $f = file_get_contents($url);
    $this->file = $f;
    $this->rssjs_decode();

  }

  function wp_fetch(){

    #Don't want to fetch it yourself and in WordPress? Let us fetch it for you.


  }

  function rssjs_decode(){

    $this->obj = json_decode($this->file);

  }

  function check($obj, $obj_two = NULL){

    if (!empty($obj)){
      return $obj;
    } elseif(!empty($obj_two)){
      # the ability to do 'or'
      # @todo - use func_get_arguments to extend this indefinetly?
      return $obj_two;
    } else {
      return false;
    }

  }

  function check_tag($obj, $tag){

    if (false != $this->check($obj)){
      $obj_arr = (array) $obj;
      if (!empty($this->check($obj_arr[$tag]))){
        return $this->check($obj_arr[$tag]);
      } else {
        return false;
      }
    } else {
      return false;
    }

  }

  function version(){
    return $this->check($this->obj->rss->version);
  }

  function feed_title(){
    return $this->check($this->obj->rss->channel->title);
  }

  function feed_url(){
    return $this->check($this->obj->rss->channel->link);
  }

  function feed_description(){
    return $this->check($this->obj->rss->channel->description);
  }

  function feed_language(){
    return $this->check($this->obj->rss->channel->language);
  }

  function feed_copyright(){
    return $this->check($this->obj->rss->channel->copyright);
  }

  function feed_last_build(){
    return $this->check($this->obj->rss->channel->lastBuildDate);
  }

  function feed_pubDate(){
    return $this->check($this->obj->rss->channel->pubDate);
  }

  function feed_docs(){
    return $this->check($this->obj->rss->channel->docs);
  }

  function feed_generator(){
    return $this->check($this->obj->rss->channel->generator);
  }

  function feed_managingEditor(){
    return $this->check($this->obj->rss->channel->managingEditor);
  }

  function feed_webMaster(){
    return $this->check($this->obj->rss->channel->webMaster);
  }

  function feed_ttl(){
    return $this->check($this->obj->rss->channel->ttl);
  }

  function feed_cloud($tag){
    return $this->check_tag($this->obj->rss->channel->cloud, $tag);
  }

  function feed_items(){
    return $this->check($this->obj->rss->channel->item);

  }

  function feed_count(){
    if (false != $this->check($this->feed_items())){
      return count($this->feed_items());
    }
  }



  function get_items(){

    foreach ($this->feed_items as $item){

      #var_dump($item);

    }

    


  }



}
