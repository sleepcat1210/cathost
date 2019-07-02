<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Firebase\JWT\JWT;

class IndexController extends Controller {

    public function index() {
        return view('admin.index.index');
    }

    public function login() {
        $key = "api";
        $nowtime = time();
        $token = [
            'iss' => 'http=>//www.helloweba.net', //签发者
            'aud' => 'http=>//www.helloweba.net', //jwt所面向的用户
            'iat' => $nowtime, //签发时间
            'nbf' => $nowtime + 10, //在什么时间之后该jwt才可用
            'exp' => $nowtime + 7200, //过期时间-10min
            'data' => [
                'userid' => 1,
                'username' => 2
            ]
        ];
        $jwt = JWT:: encode($token, $key);
        $res['result'] = 'success';
        $res['token'] = $jwt;
        return $res;
    }

    public function position() {
        $data = [
            'code' => 0,
            'data' => [
                "address" => "北京市昌平区337省道",
                "city" => "北京市",
                "geohash" => "40.10038,116.36867",
                "latitude" => "40.10038",
                "longitude" => "116.36867",
                "name" => "昌平区北七家宏福科技园(337省道北)"
            ]
        ];

        return $data;
    }
        public function captcha()
        {
            $url= captcha_img();

            // $data=[
            //     'code'=>0,
            //     'data'=>[
            //         'url'=>$url,
            //     ]
            // ];
            // return $data;
            return $url;
        }
    public function category() {
        $data = [
            'code' => 0,
              'data' => [
        [
        "id" => 20,
        "is_in_serving" => true,
        "description" => "苦了累了，来点甜的",
        "title" => "甜品饮品",
        "link" => "eleme=>//restaurants?filter_key=%7B%22category_schema%22%3A%7B%22category_name%22%3A%22%5Cu751c%5Cu54c1%5Cu996e%5Cu54c1%22%2C%22complex_category_ids%22%3A%5B240%2C241%2C242%5D%2C%22is_show_all_category%22%3Atrue%7D%2C%22restaurant_category_id%22%3A%7B%22id%22%3A239%2C%22name%22%3A%22%5Cu751c%5Cu54c1%5Cu996e%5Cu54c1%22%2C%22sub_categories%22%3A%5B%5D%2C%22image_url%22%3A%22%22%7D%2C%22activities%22%3A%5B%5D%7D&target_name=%E7%94%9C%E5%93%81%E9%A5%AE%E5%93%81&animation_type=1&is_need_mark=0&banner_type=",
        "image_url" => "/2/35/696aa5cf9820adada9b11a3d14bf5jpeg.jpeg",
        "icon_url" => "",
        "title_color" => "",
        "__v" => 0
        ],
        [
        "id" => 10,
        "is_in_serving" => true,
        "description" => "足不出户，便利回家",
        "title" => "商超便利",
        "link" => "eleme=>//restaurants?filter_key=%7B%22category_schema%22%3A%7B%22category_name%22%3A%22%5Cu5546%5Cu8d85%5Cu4fbf%5Cu5229%22%2C%22complex_category_ids%22%3A%5B254%2C255%2C256%2C257%2C258%2C271%2C272%2C273%2C274%5D%2C%22is_show_all_category%22%3Atrue%7D%2C%22restaurant_category_id%22%3A%7B%22id%22%3A252%2C%22name%22%3A%22%5Cu5546%5Cu5e97%5Cu8d85%5Cu5e02%22%2C%22sub_categories%22%3A%5B%5D%2C%22image_url%22%3A%22%22%7D%2C%22activities%22%3A%5B%5D%7D&target_name=%E5%95%86%E8%B6%85%E4%BE%BF%E5%88%A9&animation_type=1&is_need_mark=0&banner_type=",
        "image_url" => "/0/da/f42235e6929a5cb0e7013115ce78djpeg.jpeg",
        "icon_url" => "",
        "title_color" => "",
        "__v" => 0
        ],
        [
        "id" => 15,
        "is_in_serving" => true,
        "description" => "附近美食一网打尽",
        "title" => "美食",
        "link" => "eleme=>//restaurants?filter_key=%7B%22category_schema%22%3A%7B%22category_name%22%3A%22%5Cu7f8e%5Cu98df%22%2C%22complex_category_ids%22%3A%5B207%2C220%2C233%2C260%5D%2C%22is_show_all_category%22%3Afalse%7D%2C%22restaurant_category_id%22%3A%7B%22id%22%3A207%2C%22name%22%3A%22%5Cu5feb%5Cu9910%5Cu4fbf%5Cu5f53%22%2C%22sub_categories%22%3A%5B%5D%2C%22image_url%22%3A%22%22%7D%2C%22activities%22%3A%5B%5D%7D&target_name=%E7%BE%8E%E9%A3%9F&animation_type=1&is_need_mark=0&banner_type=",
        "image_url" => "/b/7e/d1890cf73ae6f2adb97caa39de7fcjpeg.jpeg",
        "icon_url" => "",
        "title_color" => "",
        "__v" => 0
        ],
        [
        "id" => 225,
        "is_in_serving" => true,
        "description" => "有菜有肉，营养均衡",
        "title" => "简餐",
        "link" => "eleme=>//restaurants?filter_key=%7B%22activity_types%22%3A%5B3%5D%2C%22category_schema%22%3A%7B%22category_name%22%3A%22%5Cu7b80%5Cu9910%22%2C%22complex_category_ids%22%3A%5B209%2C212%2C215%2C265%5D%2C%22is_show_all_category%22%3Atrue%7D%2C%22restaurant_category_id%22%3A%7B%22id%22%3A207%2C%22name%22%3A%22%5Cu5feb%5Cu9910%5Cu4fbf%5Cu5f53%22%2C%22sub_categories%22%3A%5B%5D%2C%22image_url%22%3A%22%22%7D%2C%22activities%22%3A%5B%7B%22id%22%3A3%2C%22name%22%3A%22%5Cu4e0b%5Cu5355%5Cu7acb%5Cu51cf%22%2C%22icon_name%22%3A%22%5Cu51cf%22%2C%22icon_color%22%3A%22f07373%22%2C%22is_need_filling%22%3A1%2C%22is_multi_choice%22%3A0%2C%22filter_value%22%3A3%2C%22filter_key%22%3A%22activity_types%22%7D%5D%7D&target_name=%E7%AE%80%E9%A4%90&animation_type=1&is_need_mark=0&banner_type=",
        "image_url" => "/d/38/7bddb07503aea4b711236348e2632jpeg.jpeg",
        "icon_url" => "",
        "title_color" => "",
        "__v" => 0
        ],
        [
        "id" => 403297,
        "is_in_serving" => true,
        "description" => "大胆尝鲜，遇见惊喜",
        "title" => "新店特惠",
        "link" => "eleme=>//restaurants?filter_key=%7B%22category_schema%22%3A%7B%22category_name%22%3A%22%5Cu65b0%5Cu5e97%5Cu7279%5Cu60e0%22%2C%22complex_category_ids%22%3A%5B207%2C220%2C233%2C239%2C244%2C248%2C252%2C260%5D%2C%22is_show_all_category%22%3Atrue%7D%2C%22restaurant_category_id%22%3A%7B%22id%22%3A207%2C%22name%22%3A%22%5Cu5feb%5Cu9910%5Cu4fbf%5Cu5f53%22%2C%22sub_categories%22%3A%5B%5D%2C%22image_url%22%3A%22%22%7D%2C%22support_ids%22%3A%5B-1%5D%2C%22activities%22%3A%5B%5D%7D&target_name=%E6%96%B0%E5%BA%97%E7%89%B9%E6%83%A0&animation_type=1&is_need_mark=0&banner_type=",
        "image_url" => "/a/fa/d41b04d520d445dc5de42dae9a384jpeg.jpeg",
        "icon_url" => "",
        "title_color" => "",
        "__v" => 0
        ],
        [
        "id" => 92,
        "is_in_serving" => true,
        "description" => "准时必达，超时赔付",
        "title" => "准时达",
        "link" => "eleme=>//restaurants?filter_key=%7B%22support_ids%22%3A%5B9%5D%2C%22activities%22%3A%5B%7B%22id%22%3A9%2C%22name%22%3A%22%5Cu51c6%5Cu65f6%5Cu8fbe%22%2C%22icon_name%22%3A%22%5Cu51c6%22%2C%22icon_color%22%3A%22E8842D%22%2C%22is_need_filling%22%3A0%2C%22is_multi_choice%22%3A1%2C%22filter_value%22%3A9%2C%22filter_key%22%3A%22support_ids%22%2C%22description%22%3A%22%5Cu51c6%5Cu65f6%5Cu8fbe%22%7D%5D%7D&target_name=%E5%87%86%E6%97%B6%E8%BE%BE&animation_type=1&is_need_mark=0&banner_type=",
        "image_url" => "/3/84/8e031bf7b3c036b4ec19edff16e46jpeg.jpeg",
        "icon_url" => "",
        "title_color" => "",
        "__v" => 0
        ],
        [
        "id" => 1,
        "is_in_serving" => true,
        "description" => "0元早餐0起送，每天都有新花样。",
        "title" => "预订早餐",
        "link" => "eleme=>//web?url=https%3A%2F%2Fzaocan.ele.me&target_name=%E9%A2%84%E8%AE%A2%E6%97%A9%E9%A4%90&animation_type=1&is_need_mark=&banner_type=",
        "image_url" => "/d/49/7757ff22e8ab28e7dfa5f7e2c2692jpeg.jpeg",
        "icon_url" => "",
        "title_color" => "",
        "__v" => 0
        ],
        [
        "id" => 65,
        "is_in_serving" => true,
        "description" => "",
        "title" => "土豪推荐",
        "link" => "eleme=>//restaurants?filter_key=%7B%22activities%22%3A%5B%7B%22filter_key%22%3A%22tags%22%2C%22filter_value%22%3A0%7D%5D%7D&target_name=%E5%9C%9F%E8%B1%AA%E6%8E%A8%E8%8D%90&animation_type=1&is_need_mark=0&banner_type=",
        "image_url" => "/e/7e/02b72b5e63c127d5bfae57b8e4ab1jpeg.jpeg",
        "icon_url" => "",
        "title_color" => "",
        "__v" => 0
        ],
        [
        "id" => 288,
        "is_in_serving" => true,
        "description" => "无辣不欢",
        "title" => "川湘菜",
        "link" => "eleme=>//restaurants?filter_key=%7B%22category_schema%22%3A%7B%22category_name%22%3A%22%5Cu5ddd%5Cu6e58%5Cu83dc%22%2C%22complex_category_ids%22%3A%5B221%5D%2C%22is_show_all_category%22%3Atrue%7D%2C%22restaurant_category_id%22%3A%7B%22id%22%3A220%2C%22name%22%3A%22%5Cu7279%5Cu8272%5Cu83dc%5Cu7cfb%22%2C%22sub_categories%22%3A%5B%5D%2C%22image_url%22%3A%22%22%7D%2C%22activities%22%3A%5B%5D%7D&target_name=%E5%B7%9D%E6%B9%98%E8%8F%9C&animation_type=1&is_need_mark=0&banner_type=",
        "image_url" => "/9/7c/9700836a33e05c2410bda8da59117jpeg.jpeg",
        "icon_url" => "",
        "title_color" => "",
        "__v" => 0
        ],
        [
        "id" => 286,
        "is_in_serving" => true,
        "description" => "",
        "title" => "麻辣烫",
        "link" => "eleme=>//restaurants?filter_key=%7B%22category_schema%22%3A%7B%22category_name%22%3A%22%5Cu9ebb%5Cu8fa3%5Cu70eb%22%2C%22complex_category_ids%22%3A%5B214%5D%2C%22is_show_all_category%22%3Atrue%7D%2C%22restaurant_category_id%22%3A%7B%22id%22%3A207%2C%22name%22%3A%22%5Cu5feb%5Cu9910%5Cu4fbf%5Cu5f53%22%2C%22sub_categories%22%3A%5B%5D%2C%22image_url%22%3A%22%22%7D%2C%22activities%22%3A%5B%5D%7D&target_name=%E9%BA%BB%E8%BE%A3%E7%83%AB&animation_type=1&is_need_mark=0&banner_type=",
        "image_url" => "/3/c7/a9ef469a12e7a596b559145b87f09jpeg.jpeg",
        "icon_url" => "",
        "title_color" => "",
        "__v" => 0
        ],
        [
        "id" => 289,
        "is_in_serving" => true,
        "description" => "老字号，好味道",
        "title" => "包子粥店",
        "link" => "eleme=>//restaurants?filter_key=%7B%22category_schema%22%3A%7B%22category_name%22%3A%22%5Cu5305%5Cu5b50%5Cu7ca5%5Cu5e97%22%2C%22complex_category_ids%22%3A%5B215%5D%2C%22is_show_all_category%22%3Atrue%7D%2C%22restaurant_category_id%22%3A%7B%22id%22%3A207%2C%22name%22%3A%22%5Cu5feb%5Cu9910%5Cu4fbf%5Cu5f53%22%2C%22sub_categories%22%3A%5B%5D%2C%22image_url%22%3A%22%22%7D%2C%22activities%22%3A%5B%5D%7D&target_name=%E5%8C%85%E5%AD%90%E7%B2%A5%E5%BA%97&animation_type=1&is_need_mark=0&banner_type=",
        "image_url" => "/2/17/244241b514affc0f12f4168cf6628jpeg.jpeg",
        "icon_url" => "",
        "title_color" => "",
        "__v" => 0
        ],
        [
        "id" => 9,
        "is_in_serving" => true,
        "description" => "内心小公举，一直被宠爱",
        "title" => "鲜花蛋糕",
        "link" => "eleme=>//restaurants?filter_key=%7B%22category_schema%22%3A%7B%22category_name%22%3A%22%5Cu9c9c%5Cu82b1%5Cu86cb%5Cu7cd5%22%2C%22complex_category_ids%22%3A%5B249%2C250%2C251%5D%2C%22is_show_all_category%22%3Atrue%7D%2C%22restaurant_category_id%22%3A%7B%22id%22%3A248%2C%22name%22%3A%22%5Cu9c9c%5Cu82b1%5Cu86cb%5Cu7cd5%22%2C%22sub_categories%22%3A%5B%5D%2C%22image_url%22%3A%22%22%7D%2C%22activities%22%3A%5B%5D%7D&target_name=%E9%B2%9C%E8%8A%B1%E8%9B%8B%E7%B3%95&animation_type=1&is_need_mark=0&banner_type=",
        "image_url" => "/8/83/171fd98b85dee3b3f4243b7459b48jpeg.jpeg",
        "icon_url" => "",
        "title_color" => "",
        "__v" => 0
        ],
        [
        "id" => 285,
        "is_in_serving" => true,
        "description" => "寿司定食，泡菜烤肉",
        "title" => "日韩料理",
        "link" => "eleme=>//restaurants?filter_key=%7B%22category_schema%22%3A%7B%22category_name%22%3A%22%5Cu65e5%5Cu97e9%5Cu6599%5Cu7406%22%2C%22complex_category_ids%22%3A%5B229%5D%2C%22is_show_all_category%22%3Atrue%7D%2C%22restaurant_category_id%22%3A%7B%22id%22%3A260%2C%22name%22%3A%22%5Cu5f02%5Cu56fd%5Cu6599%5Cu7406%22%2C%22sub_categories%22%3A%5B%5D%2C%22image_url%22%3A%22%22%7D%2C%22activities%22%3A%5B%5D%7D&target_name=%E6%97%A5%E9%9F%A9%E6%96%99%E7%90%86&animation_type=1&is_need_mark=0&banner_type=",
        "image_url" => "/6/1a/1e0f448be0624c62db416e864d2afjpeg.jpeg",
        "icon_url" => "",
        "title_color" => "",
        "__v" => 0
        ],
        [
        "id" => 8,
        "is_in_serving" => true,
        "description" => "一天变女神",
        "title" => "果蔬生鲜",
        "link" => "eleme=>//restaurants?filter_key=%7B%22category_schema%22%3A%7B%22category_name%22%3A%22%5Cu679c%5Cu852c%5Cu751f%5Cu9c9c%22%2C%22complex_category_ids%22%3A%5B245%2C246%2C247%5D%2C%22is_show_all_category%22%3Atrue%7D%2C%22restaurant_category_id%22%3A%7B%22id%22%3A244%2C%22name%22%3A%22%5Cu679c%5Cu852c%5Cu751f%5Cu9c9c%22%2C%22sub_categories%22%3A%5B%5D%2C%22image_url%22%3A%22%22%7D%2C%22activities%22%3A%5B%5D%7D&target_name=%E6%9E%9C%E8%94%AC%E7%94%9F%E9%B2%9C&animation_type=1&is_need_mark=0&banner_type=",
        "image_url" => "/4/34/ea0d51c9608310cf41faa5de6b8efjpeg.jpeg",
        "icon_url" => "",
        "title_color" => "",
        "__v" => 0
        ],
        [
        "id" => 236,
        "is_in_serving" => true,
        "description" => "大口大口把你吃掉",
        "title" => "汉堡薯条",
        "link" => "eleme=>//restaurants?filter_key=%7B%22category_schema%22%3A%7B%22category_name%22%3A%22%5Cu6c49%5Cu5821%22%2C%22complex_category_ids%22%3A%5B212%5D%2C%22is_show_all_category%22%3Atrue%7D%2C%22restaurant_category_id%22%3A%7B%22id%22%3A207%2C%22name%22%3A%22%5Cu5feb%5Cu9910%5Cu4fbf%5Cu5f53%22%2C%22sub_categories%22%3A%5B%5D%2C%22image_url%22%3A%22%22%7D%2C%22activities%22%3A%5B%5D%7D&target_name=%E6%B1%89%E5%A0%A1%E8%96%AF%E6%9D%A1&animation_type=1&is_need_mark=0&banner_type=",
        "image_url" => "/b/7f/432619fb21a40b05cd25d11eca02djpeg.jpeg",
        "icon_url" => "",
        "title_color" => "",
        "__v" => 0
        ],
        [
        "id" => 287,
        "is_in_serving" => true,
        "description" => "西餐始祖，欧洲的味道",
        "title" => "披萨意面",
        "link" => "eleme=>//restaurants?filter_key=%7B%22category_schema%22%3A%7B%22category_name%22%3A%22%5Cu62ab%5Cu8428%5Cu610f%5Cu9762%22%2C%22complex_category_ids%22%3A%5B211%5D%2C%22is_show_all_category%22%3Atrue%7D%2C%22restaurant_category_id%22%3A%7B%22id%22%3A260%2C%22name%22%3A%22%5Cu5f02%5Cu56fd%5Cu6599%5Cu7406%22%2C%22sub_categories%22%3A%5B%5D%2C%22image_url%22%3A%22%22%7D%2C%22activities%22%3A%5B%5D%7D&target_name=%E6%8A%AB%E8%90%A8%E6%84%8F%E9%9D%A2&animation_type=1&is_need_mark=0&banner_type=",
        "image_url" => "/7/b6/235761e50d391445f021922b71789jpeg.jpeg",
        "icon_url" => "",
        "title_color" => "",
        "__v" => 0
        ]
        ]
             ];
        return $data;
    }
    public function shops(Request $request){
        $shops=[
            [
    "name"=> "嘉禾一品（温都水城）",
    "address"=> "北京市昌平区宏福苑温都水城F1",
    "id"=> 1,
    "latitude"=> 40.10039,
    "longitude"=> 116.36868,
    "location"=> [
      116.36868,
      40.10039
    ],
    "phone"=> "13437850035",
    "category"=> "快餐便当/简餐",
    "supports"=> [
      [
        "description"=> "已加入“外卖保”计划，食品安全有保障",
        "icon_color"=> "999999",
        "icon_name"=> "保",
        "id"=> 7,
        "name"=> "外卖保",
        "_id"=> "5a5859a19c2bc57d52df30b3"
      ],
      [
        "description"=> "准时必达，超时秒赔",
        "icon_color"=> "57A9FF",
        "icon_name"=> "准",
        "id"=> 9,
        "name"=> "准时达",
        "_id"=> "5a5859a19c2bc57d52df30b2"
      ],
      [
        "description"=> "该商家支持开发票，请在下单时填写好发票抬头",
        "icon_color"=> "999999",
        "icon_name"=> "票",
        "id"=> 4,
        "name"=> "开发票",
        "_id"=> "5a5859a19c2bc57d52df30b1"
      ]
    ],
    "status"=>1,
    "recent_order_num"=> 106,
    "rating_count"=> 961,
    "rating"=>4.7,
    "promotion_info"=> "欢迎光临，用餐高峰请提前下单，谢谢",
    "piecewise_agent_fee"=> [
      "tips"=> "配送费约¥5"
    ],
    "opening_hours"=> [
      "8:30/20:30"
    ],
    "license"=> [
      "catering_service_license_image"=> "160e91e17fa2164.png",
      "business_license_image"=> "160e91e0a9f2163.png"
    ],
    "is_new"=> true,
    "is_premium"=> true,
    "image_path"=> "16018a5c08533.jpeg",
    "identification"=>[
      "registered_number"=> "",
      "registered_address"=> "",
      "operation_period"=> "",
      "licenses_scope"=> "",
      "licenses_number"=> "",
      "licenses_date"=> "",
      "legal_person"=> "",
      "identificate_date"=> null,
      "identificate_agency"=> "",
      "company_name"=> ""
    ],
    "float_minimum_order_amount"=> 20,
    "float_delivery_fee"=> 5,
    "distance"=> "2120.1公里",
    "order_lead_time"=> "31小时24分钟",
    "description"=> "sad",
    "delivery_mode"=> [
      "color"=> "57A9FF",
      "id"=> 1,
      "is_solid"=> true,
      "text"=> "硅谷专送"
    ],
    "activities"=>[],
    "__v"=> 0
  ],
[
    "name"=> "闪电哥哥ghj慰问费22",
    "address"=> "河南省郑州市蜀山区南二环路天鹅湖万达广场8号楼1705室",
    "id"=> 479,
    "latitude"=> 31.81948,
    "longitude"=> 117.22124,
    "location"=> [
      93.50611,
      42.84974
    ],
    "phone"=> "122343adsa",
    "category"=> "异国料理",
    "supports"=> [
      [
        "description"=> "已加入“外卖保”计划，食品安全有保障",
        "icon_color"=> "999999",
        "icon_name"=> "保",
        "id"=> 7,
        "name"=> "外卖保",
        "_id"=> "5a66f45c76d92175ac4464dd"
      ],
      [
        "description"=> "准时必达，超时秒赔",
        "icon_color"=> "57A9FF",
        "icon_name"=> "准",
        "id"=>9,
        "name"=> "准时达",
        "_id"=> "5a66f45c76d92175ac4464dc"
      ],
      [
        "description"=> "该商家支持开发票，请在下单时填写好发票抬头",
        "icon_color"=> "999999",
        "icon_name"=> "票",
        "id"=> 4,
        "name"=> "开发票",
        "_id"=> "5a66f45c76d92175ac4464db"
      ]
    ],
    "status"=> 1,
    "recent_order_num"=> 755,
    "rating_count"=> 167,
    "rating"=> 4.2,
    "promotion_info"=> "欢迎光临，用餐高峰请提前下单，谢谢",
    "piecewise_agent_fee"=> [
      "tips"=> "配送费约¥5"
    ],
    "opening_hours"=> [
      "8:30/20:30"
    ],
    "license"=> [
      "catering_service_license_image"=> "",
      "business_license_image"=> ""
    ],
    "is_new"=> true,
    "is_premium"=> true,
    "image_path"=> "161e60bf5b85700.png",
    "identification"=> [
      "registered_number"=> "",
      "registered_address"=>"",
      "operation_period"=> "",
      "licenses_scope"=> "",
      "licenses_number"=>"",
      "licenses_date"=> "",
      "legal_person"=> "",
      "identificate_date"=> null,
      "identificate_agency"=> "",
      "company_name"=> ""
    ],
    "float_minimum_order_amount"=> 20,
    "float_delivery_fee"=> 5,
    "distance"=> "1010.3公里",
    "order_lead_time"=> "21小时7分钟",
    "description"=> "描述性内容1",
    "delivery_mode"=> [
      "color"=> "57A9FF",
      "id"=> 1,
      "is_solid"=> true,
      "text"=> "硅谷专送"
    ],
    "activities"=> [
      [
        "icon_name"=> "减",
        "name"=> "满减优惠",
        "description"=> "满30减5，满60减8",
        "icon_color"=> "f07373",
        "id"=> 1,
        "_id"=> "5a66f45c76d92175ac4464de"
      ]
    ],
    "__v"=> 0
  ],
        ];

        $data=[
            'code'=>0,
            'data'=>$shops
            ];
        return $data;
    }

}
