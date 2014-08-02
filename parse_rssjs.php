<?php

class parse_rssjs {

  var $file;
  var $obj;

  function __construct($file_gotten){

    $this->file = $file_gotten;

  }

  function fetch(){

    #Don't want to fetch it yourself? Let us fetch it for you.
    $f = file_get_contents($this->file);
    $this->file = $f;
    $this->rssjs_decode();

  }

  function wp_fetch(){

    #Don't want to fetch it yourself and in WordPress? Let us fetch it for you.


  }

  function rssjs_decode(){

    $this->obj = json_decode($file);

  }

  function version(){
    return $this->obj->rss->version;
  }

  function feed_title(){
    return $this->obj->rss->channel->title;
  }

  function feed_url(){
    return $this->obj->rss->channel->link;
  }

  function feed_description(){
    return $this->obj->rss->channel->description;
  }

  function feed_language(){
    return $this->obj->rss->channel
  }

  function top_walker($file){

    $obj = $this->obj;
    foreach ($jd->rss->channel->item as $item){

      #var_dump($item);

    }


  }



}
