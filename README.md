# pachong

类似 jquery 操纵DOM 获取网页上的数据 
使用的是 fabpot/goutte 这个包
$client = new Client();
$crawler = $client->request('GET', 'https://www.news.com.au/finance/markets');
$arr = [];
$crawler->filter('div#newscorpau_external_includes_external_includes-127 table.market-table tbody tr')->each(function($node,$k) use (&$arr) {
	  $arr[$k]['name'] = $node->filter('td')->eq(0)->text();
	  $arr[$k]['price'] = $node->filter('td')->eq(1)->text();
	  $arr[$k]['change'] = $node->filter('td')->eq(2)->text();
	  $arr[$k]['percent'] = $node->filter('td span')->text();
});

 
web pachong 例子
