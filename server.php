<?php
class Rss
{
    public function get_rss(){
        $rss = [
            ['site' => 'Klix', 'name' => 'nogomet', 'link' => 'https://www.klix.ba/rss/sport/nogomet'],
            ['site' => 'Klix', 'name' => 'ljepotice', 'link' => 'https://www.klix.ba/rss/magazin/ljepotice'],
            ['site' => 'Klix', 'name' => 'tehnologija', 'link' => 'https://www.klix.ba/rss/scitech/tehnologija'],
            ['site' => 'Yahoo', 'name' => 'Entertainment', 'link' => 'https://www.yahoo.com/news/rss/entertainment'],
            ['site' => 'Washingtonpost', 'name' => 'Politics', 'link' => 'http://feeds.washingtonpost.com/rss/rss_election-2012'],
            ['site' => 'Washingtonpost', 'name' => 'Erik Wemple', 'link' => 'http://feeds.washingtonpost.com/rss/rss_erik-wemple']
        ];
        return $rss;
    }
}

$rss = new Rss;
$res = $rss->get_rss();

echo json_encode($res);

?>