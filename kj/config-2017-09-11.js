// 彩票开奖配置
exports.cp=[
{                                                                                                         	//
		title:'高速六合彩',                                                                                    	//
		source:'杏彩',                                                                                        	//
		name:'gslhc',                                                                                         	//
		enable:true,                                                                                          	//
		timer:'gslhc',                                                                                        	//
		option:{                                                                                              	//
			host:"127.0.0.1",                                                                                   	//
			timeout:50000,                                                                                    	//
			path: '/index.php/xingcai/xclhc',                                                                 	//
			headers:{                                                                                         	//
				"User-Agent": "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0) "                           	//
			}                                                                                                 	//
		},                                                                                                    	//
		parse:function(str){                                                                                  	//
			try{                                                                                              	//
				str=str.substr(0,200);	                                                                      	//
				var reg=/<row expect="([\d\-]+?)" opencode="([\d\,]+?)" opentime="([\d\:\- ]+?)"/;            	//
				var m;                                                                                        	//
				if(m=str.match(reg)){                                                                         	//
					return {                                                                                  	//
						type:77,                                                                              	//
						time:m[3],                                                                            	//
						number:m[1],                                                                          	//
						data:m[2]                                                                             	//
					};                                                                                        	//
				}					                                                                          	//
			}catch(err){                                                                                      	//杏
				throw('高速6合彩解析数据不正确');                                                             	//彩
			}                                                                                                 	//系
		}                                                                                                     	//统
	},					//
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	{                                                                                                           //
		title:'16彩票重庆时时彩',                                                                               //
		source:'16彩票',                                                                                 		//
		name:'cqssc',                                                                                           //
		enable:true,                                                                                            //
		timer:'cqssc',                                                                                          //
		option:{                                                                                                //
			host:"127.0.0.1",                                                                                   //
			timeout:50000,                                                                                      //
			path: '/xml/cqssc/cqssc_16cp.php',                                                                      //重
			headers:{                                                                                           //庆
				"User-Agent": "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0) "                             //时
			}                                                                                                   //时
		},                                                                                                      //彩
		parse:function(str){                                                                                    //
			try{                                                                                                //
				str=str.substr(0,200);                                                                       //
				var reg=/<row expect="([\d\-]+?)" opencode="([\d\,]+?)" opentime="([\d\:\- ]+?)"/;              //
				var m;                                                                                  //
				if(m=str.match(reg)){                                                                           //
					return {                                                                                    //
						type:1,                                                                                 //
						time:m[3],                                                                              //
						number:m[1],                                                                            //
						data:m[2]                                                                               //
					};                                                                                          //
				}                                                                            //
			}catch(err){                                                                                        //
				throw('--------16彩票重庆时时彩解析数据不正确');                                                //
			}                                                                                                   //
		}                                                                                                       //
	},	                                                                                                        //
                                                                                                                //
	{                                                                                                           //
		title:'360彩票重庆时时彩',                                                                              //
		source:'360彩票',                                                                                		//
		name:'cqssc',                                                                                           //
		enable:true,                                                                                            //
		timer:'cqssc1',                                                                                          //
		option:{                                                                                                //
			host:"127.0.0.1",                                                                                   //
			timeout:50000,                                                                                      //重
			path: '/xml/cqssc/cqssc_360.php',                                                                       //庆
			headers:{                                                                                           //时
				"User-Agent": "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0) "                             //时
			}                                                                                                   //彩
		},                                                                                                      //
		parse:function(str){                                                                                    //
			try{                                                                                                //
				str=str.substr(0,200);                                                                        //
				var reg=/<row expect="([\d\-]+?)" opencode="([\d\,]+?)" opentime="([\d\:\- ]+?)"/;              //
				var m;                                                                                         //
				if(m=str.match(reg)){                                                                           //
					return {                                                                                    //
						type:1,                                                                                 //
						time:m[3],                                                                              //
						number:m[1],                                                                            //
						data:m[2]                                                                               //
					};                                                                                          //
				}					                                                                            //
			}catch(err){                                                                                        //
				throw('--------360彩票重庆时时彩解析数据不正确');                                               //
			}                                                                                                   //
		}                                                                                                       //
	},	                                                                                                        //
	                                                                                                            //
	{                                                                                                           //
		title:'百度重庆时时彩',                                                                                 //重
		source:'百度乐彩',                                                                                 		//庆
		name:'cqssc',                                                                                           //时
		enable:true,                                                                                            //时
		timer:'cqssc2',                                                                                          //彩
		option:{                                                                                                //
			host:"127.0.0.1",                                                                                   //
			timeout:50000,                                                                                      //
			path: '/xml/cqssc/cqssc_cle.php',                                                                       //
			headers:{                                                                                           //
				"User-Agent": "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0) "                             //
			}                                                                                                   //
		},                                                                                                      //
		parse:function(str){                                                                                    //
			try{                                                                                                //
				str=str.substr(0,200);                                                                        //
				var reg=/<row expect="([\d\-]+?)" opencode="([\d\,]+?)" opentime="([\d\:\- ]+?)"/;              //
				var m;                                                                                          //
				if(m=str.match(reg)){                                                                           //
					return {                                                                                    //
						type:1,                                                                                 //
						time:m[3],                                                                              //
						number:m[1],                                                                            //
						data:m[2]                                                                               //
					};                                                                                          //
				}					                                                                            //
			}catch(err){                                                                                        //重
				throw('--------百度重庆时时彩解析数据不正确');                                                  //庆
			}                                                                                                   //时
		}                                                                                                       //时
    },                                                                                                          //彩
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	{                                                                                                           //
		title:'新疆时时彩',                                                                           	    	//
		source:'新疆福彩网',                                                                                 	//
		name:'xjssc',                                                                                           //
		enable:true,                                                                                            //
		timer:'xjssc',                                                                                          //
		option:{                                                                                                //
			host:"127.0.0.1",                                                                                   //
			timeout:50000,                                                                                      //新
			path: '/xml/xjssc/xjssc.php',                                                                       	//疆
			headers:{                                                                                           //时
				"User-Agent": "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0) "                             //时
			}                                                                                                   //彩
		},                                                                                                      //
		parse:function(str){                                                                                    //
			try{                                                                                                //
				str=str.substr(0,200);	                                                                        //
				var reg=/<row expect="([\d\-]+?)" opencode="([\d\,]+?)" opentime="([\d\:\- ]+?)"/;              //
				var m;                                                                                          //
				if(m=str.match(reg)){                                                                           //
					return {                                                                                    //
						type:12,                                                                                //
						time:m[3],                                                                              //
						number:m[1],                                                                            //
						data:m[2]                                                                               //
					};                                                                                          //
				}					                                                                            //
			}catch(err){                                                                                        //
				throw('--------新疆福利彩票解析数据不正确');                                                    //
			}                                                                                                   //
		}                                                                                                       //新
	},	                                                                                                        //疆
                                                                                                                //时
	{                                                                                                           //时
		title:'新疆时时彩',                                                                              		//彩
		source:'新疆福彩网2',                                                                                	//
		name:'xjssc',                                                                                           //
		enable:true,                                                                                            //
		timer:'xjssc',                                                                                          //
		option:{                                                                                                //
			host:"127.0.0.1",                                                                                   //
			timeout:50000,                                                                                      //
			path: '/xml/xjssc/xjssc_list_0.php',                                                                    //
			headers:{                                                                                           //
				"User-Agent": "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0) "                             //
			}                                                                                                   //
		},                                                                                                      //
		parse:function(str){                                                                                    //
			try{                                                                                                //
				str=str.substr(0,200);	                                                                        //
				var reg=/<row expect="([\d\-]+?)" opencode="([\d\,]+?)" opentime="([\d\:\- ]+?)"/;              //
				var m;                                                                                          //
				if(m=str.match(reg)){                                                                           //
					return {                                                                                    //
						type:12,                                                                                //
						time:m[3],                                                                              //
						number:m[1],                                                                            //
						data:m[2]                                                                               //
					};                                                                                          //新
				}					                                                                            //疆
			}catch(err){                                                                                        //时
				throw('--------新疆福利彩票解析数据不正确');                                                  	//时
			}                                                                                                   //彩
		}                                                                                                       //
	},                                                                                         					//
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	{                                                                                                           //
		title:'天津时时彩',                                                                           	    	//
		source:'天津福利彩票网',                                                                                //
		name:'tjssc',                                                                                           //
		enable:true,                                                                                            //
		timer:'tjssc',                                                                                          //
		option:{                                                                                                //
			host:"127.0.0.1",                                                                                   //天
			timeout:50000,                                                                                      //津
			path: '/xml/tjssc/tjssc.php',                                                                 		    //时
			headers:{                                                                                           //时
				"User-Agent": "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0) "                             //彩
			}                                                                                                   //
		},                                                                                                      //
		parse:function(str){                                                                                    //
			try{                                                                                                //
				str=str.substr(0,200);	                                                                        //
				var reg=/<row expect="([\d\-]+?)" opencode="([\d\,]+?)" opentime="([\d\:\- ]+?)"/;              //
				var m;                                                                                          //
				if(m=str.match(reg)){                                                                           //
					return {                                                                                    //
						type:60,                                                                                //
						time:m[3],                                                                              //
						number:m[1],                                                                            //
						data:m[2]                                                                               //
					};                                                                                          //天
				}					                                                                            //津
			}catch(err){                                                                                        //时
				throw('--------天津时时彩解析数据不正确');                                                      //时
			}                                                                                                   //彩
		}                                                                                                       //
	},	                                                                                                        //
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 /*  	{                                                                                                           //
		title:'百度彩票',
		source:'百度彩票平台',
		name:'bjpk10',
		enable:true,
		timer:'bjpk10',

		option:{

			host:"baidu.lecai.com",
			timeout:25000,
			path: '/lottery/draw/view/557',
			headers:{
				"User-Agent": "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0)"
			}
		},
		
		parse:function(str){
			try{
				return getFromBDCP(str,20);
			}catch(err){
				throw('百度彩票解析数据不正确');                                                    //
			}                                                                                                   //北
		}                                                                                                       //京
	},	                                                                                                        //PK
         */                                                                                                        //拾
	{                                                                                                           //
		title:'北京pk10',                                                                              			//
		source:'北京福彩网',                                                                                	//
		name:'bjpk10',                                                                                          //
		enable:true,                                                                                            //
		timer:'bjpk10',                                                                                         //
		option:{                                                                                                //
			host:"post1.dadi163.com",                                                                                   //
			timeout:50000,                                                                                      //
<<<<<<< .mine
			path: '/pk10.txt',                                                                     //
||||||| .r253
			path: '/xml/pk10/pk10_1680api.php',                                                                     //
=======
			path: '/xml/pk10/pk10_cp5678.php',                                                                     //
>>>>>>> .r386
			headers:{                                                                                           //
				"User-Agent": "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0) "                             //
			}                                                                                                   //
		},                                                                                                      //
		parse:function(str){                                                                                    //
			try{                                                                                                //
				str=str.substr(0,200);	                                                                        //
				var reg=/<row expect="([\d\-]+?)" opencode="([\d\,]+?)" opentime="([\d\:\- ]+?)"/;              //
				var m;                                                                                          //
				if(m=str.match(reg)){                                                                           //
					return {                                                                                    //
						type:20,                                                                                //
						time:m[3],                                                                              //
						number:m[1],                                                                            //
						data:m[2]                                                                               //北
					};                                                                                          //京
				}					                                                                            //PK
			}catch(err){                                                                                        //拾
				throw('--------北京福彩网pk10解析数据不正确');                                                  //
			}                                                                                                   //
		}                                                                                                       //
	},                                                                                     					//
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	{                                                                                                           //
		title:'百度2广东11选5',                                                                                 //
		source:'百度1广东11x5',                                                                                 //
		name:'gd11',                                                                                            //
		enable:true,                                                                                            //
		timer:'gd11',                                                                                           //
		option:{                                                                                                //
			host:"127.0.0.1",                                                                                   //
			timeout:50000,                                                                                      //
			path: '/xml/gd11/gd115_baidu.php',                                                                      //广
			headers:{                                                                                           //东
				"User-Agent": "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0) "                             //11
			}                                                                                                   //选
		},                                                                                                      //5
		parse:function(str){                                                                                    //
			try{                                                                                                //
				str=str.substr(0,200);	                                                                        //
				var reg=/<row expect="([\d\-]+?)" opencode="([\d\,]+?)" opentime="([\d\:\- ]+?)"/;              //
				var m;                                                                                          //
				if(m=str.match(reg)){                                                                           //
					return {                                                                                    //
						type:6,                                                                                 //
						time:m[3],                                                                              //
						number:m[1],                                                                            //
						data:m[2]                                                                               //
					};                                                                                          //
				}					                                                                            //
			}catch(err){                                                                                        //
				throw('--------广东11x5解析数据不正确');                                                        //
			}                                                                                                   //
		}                                                                                                       //
	},	                                                                                                        //
                                                                                                                //
	{                                                                                                           //
		title:'爱彩乐广东11选5',                                                                                //
		source:'广东11x5爱彩乐',                                                                                //
		name:'gd11',                                                                                            //
		enable:true,                                                                                            //
		timer:'gd11',                                                                                           //
		option:{                                                                                                //
			host:"127.0.0.1",                                                                                   //
			timeout:50000,                                                                                      //广
			path: '/xml/gd11/gd115_icaile.php',                                                                     //东
			headers:{                                                                                           //11
				"User-Agent": "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0) "                             //选
			}                                                                                                   //5
		},                                                                                                      //
		parse:function(str){                                                                                    //
			try{                                                                                                //
				str=str.substr(0,200);	                                                                        //
				var reg=/<row expect="([\d\-]+?)" opencode="([\d\,]+?)" opentime="([\d\:\- ]+?)"/;              //
				var m;                                                                                          //
				if(m=str.match(reg)){                                                                           //
					return {                                                                                    //
						type:6,                                                                                 //
						time:m[3],                                                                              //
						number:m[1],                                                                            //
						data:m[2]                                                                               //
					};                                                                                          //
				}					                                                                            //
			}catch(err){                                                                                        //
				throw('--------广东11x5解析数据不正确');                                                        //
			}                                                                                                   //
		}                                                                                                       //
	},	                                                                                                        //
	                                                                                                            //
	{                                                                                                           //
		title:'彩88广东11选5',                                                                                  //广
		source:'广东11选5彩88',                                                                                 //东
		name:'gd11',                                                                                            //11
		enable:true,                                                                                            //选
		timer:'gd11',                                                                                           //5
		option:{                                                                                                //
			host:"127.0.0.1",                                                                                   //
			timeout:50000,                                                                                      //
			path: '/xml/gd11/gd115_cai88.php',                                                                      //
			headers:{                                                                                           //
				"User-Agent": "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0) "                             //
			}                                                                                                   //
		},                                                                                                      //
		parse:function(str){                                                                                    //
			try{                                                                                                //
				str=str.substr(0,200);	                                                                        //
				var reg=/<row expect="([\d\-]+?)" opencode="([\d\,]+?)" opentime="([\d\:\- ]+?)"/;              //
				var m;                                                                                          //
				if(m=str.match(reg)){                                                                           //
					return {                                                                                    //
						type:6,                                                                                 //
						time:m[3],                                                                              //
						number:m[1],                                                                            //
						data:m[2]                                                                               //
					};                                                                                          //
				}					                                                                            //
			}catch(err){                                                                                        //广
				throw('--------彩88广东11选5解析数据不正确');                                                   //东
			}                                                                                                   //11
		}                                                                                                       //选
    },                                                                                                          //5
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	{                                                                                                           //
		title:'360彩票山东11选5',                                                                               //
		source:'360彩票',                                                                                	    //
		name:'sd11',                                                                                            //
		enable:true,                                                                                            //
		timer:'sd11',                                                                                           //
		option:{                                                                                                //
			host:"127.0.0.1",                                                                                   //
			timeout:50000,                                                                                      //
			path: '/index.php/Sd115/sd115_129kai?type=7',                                                                        //山
			headers:{                                                                                           //东
				"User-Agent": "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0) "                             //11
			}                                                                                                   //选
		},                                                                                                      //5
		parse:function(str){                                                                                    //
			try{                                                                                                //
				str=str.substr(0,200);	                                                                        //
				var reg=/<row expect="([\d\-]+?)" opencode="([\d\,]+?)" opentime="([\d\:\- ]+?)"/;              //
				var m;                                                                                          //
				if(m=str.match(reg)){                                                                           //
					return {                                                                                    //
						type:7,                                                                                 //
						time:m[3],                                                                              //
						number:m[1],                                                                            //
						data:m[2]                                                                               //
					};                                                                                          //
				}					                                                                            //
			}catch(err){                                                                                        //
				throw('--------360彩票山东11选5解析数据不正确');                                                //
			}                                                                                                   //
		}                                                                                                       //
	},	                                                                                                        //
                                                                                                                //
	{                                                                                                           //
		title:'彩乐乐山东11选5',                                                                                //
		source:'彩乐乐',                                                                            		    //
		name:'sd11',                                                                                            //
		enable:true,                                                                                            //
		timer:'sd11',                                                                                           //
		option:{                                                                                                //
			host:"127.0.0.1",                                                                                   //
			timeout:50000,                                                                                      //山
			path: '/xml/sd11/sd115_cle.php',                                                                   	    //东
			headers:{                                                                                           //11
				"User-Agent": "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0) "                             //选
			}                                                                                                   //5
		},                                                                                                      //
		parse:function(str){                                                                                    //
			try{                                                                                                //
				str=str.substr(0,200);	                                                                        //
				var reg=/<row expect="([\d\-]+?)" opencode="([\d\,]+?)" opentime="([\d\:\- ]+?)"/;              //
				var m;                                                                                          //
				if(m=str.match(reg)){                                                                           //
					return {                                                                                    //
						type:7,                                                                                 //
						time:m[3],                                                                              //
						number:m[1],                                                                            //
						data:m[2]                                                                               //
					};                                                                                          //
				}					                                                                            //
			}catch(err){                                                                                        //
				throw('--------彩乐乐山东11选5解析数据不正确');                                                 //
			}                                                                                                   //
		}                                                                                                       //
	},	                                                                                                        //
	                                                                                                            //
	{                                                                                                           //
		title:'彩88山东11选5',                                                                                  //山
		source:'广东11选5彩88',                                                                                 //东
		name:'sd11',                                                                                            //11
		enable:true,                                                                                            //选
		timer:'sd11',                                                                                           //5
		option:{                                                                                                //
			host:"127.0.0.1",                                                                                   //
			timeout:50000,                                                                                      //
			path: '/xml/sd11/sd115_cai88.php',                                                                      //
			headers:{                                                                                           //
				"User-Agent": "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0) "                             //
			}                                                                                                   //
		},                                                                                                      //
		parse:function(str){                                                                                    //
			try{                                                                                                //
				str=str.substr(0,200);	                                                                        //
				var reg=/<row expect="([\d\-]+?)" opencode="([\d\,]+?)" opentime="([\d\:\- ]+?)"/;              //
				var m;                                                                                          //
				if(m=str.match(reg)){                                                                           //
					return {                                                                                    //
						type:7,                                                                                 //
						time:m[3],                                                                              //
						number:m[1],                                                                            //
						data:m[2]                                                                               //
					};                                                                                          //
				}					                                                                            //
			}catch(err){                                                                                        //山
				throw('--------彩88山东11选5解析数据不正确');                                                   //东
			}                                                                                                   //11
		}                                                                                                       //选
    },                                                                                                          //5
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	{                                                                                                           //
		title:'360彩票江西11选5',                                                                           	//
		source:'360彩票',                                                                                 		//
		name:'jx11',                                                                                            //
		enable:true,                                                                                            //
		timer:'jx11',                                                                                           //
		option:{                                                                                                //
			host:"127.0.0.1",                                                                                   //
			timeout:50000,                                                                                      //江
			path: '/xml/jx11/jx115_360.php',                                                                      	//西
			headers:{                                                                                           //11
				"User-Agent": "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0) "                             //选
			}                                                                                                   //5
		},                                                                                                      //
		parse:function(str){                                                                                    //
			try{                                                                                                //
				str=str.substr(0,200);	                                                                        //
				var reg=/<row expect="([\d\-]+?)" opencode="([\d\,]+?)" opentime="([\d\:\- ]+?)"/;              //
				var m;                                                                                          //
				if(m=str.match(reg)){                                                                           //
					return {                                                                                    //
						type:16,                                                                                //
						time:m[3],                                                                              //
						number:m[1],                                                                            //
						data:m[2]                                                                               //
					};                                                                                          //
				}					                                                                            //
			}catch(err){                                                                                        //
				throw('--------360彩票江西11选5解析数据不正确');                                                //
			}                                                                                                   //
		}                                                                                                       //江
	},	                                                                                                        //西
                                                                                                                //11
	{                                                                                                           //选
		title:'彩88江西11选5',                                                                              	//5
		source:'彩88',                                                                                			//
		name:'jx11',                                                                                            //
		enable:true,                                                                                            //
		timer:'jx11',                                                                                           //
		option:{                                                                                                //
			host:"127.0.0.1",                                                                                   //
			timeout:50000,                                                                                      //
			path: '/xml/jx11/jx115_cai88.php',                                                                      //
			headers:{                                                                                           //
				"User-Agent": "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0) "                             //
			}                                                                                                   //
		},                                                                                                      //
		parse:function(str){                                                                                    //
			try{                                                                                                //
				str=str.substr(0,200);	                                                                        //
				var reg=/<row expect="([\d\-]+?)" opencode="([\d\,]+?)" opentime="([\d\:\- ]+?)"/;              //
				var m;                                                                                          //
				if(m=str.match(reg)){                                                                           //
					return {                                                                                    //
						type:16,                                                                                //
						time:m[3],                                                                              //
						number:m[1],                                                                            //
						data:m[2]                                                                               //
					};                                                                                          //江
				}					                                                                            //西
			}catch(err){                                                                                        //11
				throw('--------彩88江西11选5解析数据不正确');                                                  	//选
			}                                                                                                   //5
		}                                                                                                       //
	},                                                                                         					//
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	{                                                                                                           //
		title:'上海11选5',                                                                           	    	//
		source:'360彩票',                                                                                 		//
		name:'sh11',                                                                                            //
		enable:true,                                                                                            //
		timer:'sh11',                                                                                           //
		option:{                                                                                                //
			host:"127.0.0.1",                                                                                   //
			timeout:50000,                                                                                      //上
			path: '/xml/sh11/sh115_360.php',                                                                        //海
			headers:{                                                                                           //11
				"User-Agent": "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0) "                             //选
			}                                                                                                   //5
		},                                                                                                      //
		parse:function(str){                                                                                    //
			try{                                                                                                //
				str=str.substr(0,200);	                                                                        //
				var reg=/<row expect="([\d\-]+?)" opencode="([\d\,]+?)" opentime="([\d\:\- ]+?)"/;              //
				var m;                                                                                          //
				if(m=str.match(reg)){                                                                           //
					return {                                                                                    //
						type:15,                                                                                //
						time:m[3],                                                                              //
						number:m[1],                                                                            //
						data:m[2]                                                                               //
					};                                                                                          //
				}					                                                                            //
			}catch(err){                                                                                        //
				throw('--------360彩票上海11选5解析数据不正确');                                                //
			}                                                                                                   //上
		}                                                                                                       //海
	},	                                                                                                        //11
                                                                                                                //选
	{                                                                                                           //5
		title:'上海11选5',                                                                              		//
		source:'爱彩乐',                                                                                		//
		name:'sh11',                                                                                          	//
		enable:true,                                                                                            //
		timer:'sh11',                                                                                         	//
		option:{                                                                                                //
			host:"127.0.0.1",                                                                                   //
			timeout:50000,                                                                                      //
			path: '/xml/sh11/sh115_icle.php',                                                                     	//
			headers:{                                                                                           //
				"User-Agent": "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0) "                             //
			}                                                                                                   //
		},                                                                                                      //
		parse:function(str){                                                                                    //
			try{                                                                                                //
				str=str.substr(0,200);	                                                                        //
				var reg=/<row expect="([\d\-]+?)" opencode="([\d\,]+?)" opentime="([\d\:\- ]+?)"/;              //
				var m;                                                                                          //
				if(m=str.match(reg)){                                                                           //
					return {                                                                                    //
						type:15,                                                                                //
						time:m[3],                                                                              //
						number:m[1],                                                                            //上
						data:m[2]                                                                               //海
					};                                                                                          //11
				}					                                                                            //选
			}catch(err){                                                                                        //5
				throw('--------爱彩乐上海11选5解析数据不正确');                                                  //
			}                                                                                                   //
		}                                                                                                       //
	},                                                                                         					//
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	{                                                                                                           //
		title:'360彩票江苏快3',                                                                           		//
		source:'360彩票',                                                                                 		//
		name:'jsk3',                                                                                            //
		enable:true,                                                                                            //
		timer:'jsk3',                                                                                           //
		option:{                                                                                                //
			host:"127.0.0.1",                                                                                   //
			timeout:50000,                                                                                      //江
			path: '/xml/jsk3/jsk3_360.php',                                                                      	//苏
			headers:{                                                                                           //快
				"User-Agent": "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0) "                             //3
			}                                                                                                   //
		},                                                                                                      //
		parse:function(str){                                                                                    //
			try{                                                                                                //
				str=str.substr(0,200);	                                                                        //
				var reg=/<row expect="([\d\-]+?)" opencode="([\d\,]+?)" opentime="([\d\:\- ]+?)"/;              //
				var m;                                                                                          //
				if(m=str.match(reg)){                                                                           //
					return {                                                                                    //
						type:79,                                                                                //
						time:m[3],                                                                              //
						number:m[1],                                                                            //
						data:m[2]                                                                               //
					};                                                                                          //
				}					                                                                            //
			}catch(err){                                                                                        //
				throw('--------360彩票江苏快3解析数据不正确');                                                  //
			}                                                                                                   //
		}                                                                                                       //江
	},	                                                                                                        //苏
                                                                                                                //快
	{                                                                                                           //3
		title:'163江苏快3',                                                                              		//
		source:'网易163',                                                                                		//
		name:'jsk3',                                                                                            //
		enable:true,                                                                                            //
		timer:'jsk3',                                                                                           //
		option:{                                                                                                //
			host:"127.0.0.1",                                                                                   //
			timeout:50000,                                                                                      //
			path: '/xml/jsk3/jsk3_163.php',                                                                         //
			headers:{                                                                                           //
				"User-Agent": "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0) "                             //
			}                                                                                                   //
		},                                                                                                      //
		parse:function(str){                                                                                    //
			try{                                                                                                //
				str=str.substr(0,200);	                                                                        //
				var reg=/<row expect="([\d\-]+?)" opencode="([\d\,]+?)" opentime="([\d\:\- ]+?)"/;              //
				var m;                                                                                          //
				if(m=str.match(reg)){                                                                           //
					return {                                                                                    //
						type:79,                                                                                //
						time:m[3],                                                                              //
						number:m[1],                                                                            //
						data:m[2]                                                                               //
					};                                                                                          //
				}					                                                                            //
			}catch(err){                                                                                        //江
				throw('--------163江苏快3解析数据不正确');                                                  	//苏
			}                                                                                                   //快
		}                                                                                                       //3
	},                                                                                         					//
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	{                                                                                                                             //
		title:'福彩3D',                                                                                                           //
		source:'香雨娱乐平台',                                                                                                    //
		name:'fc3d',                                                                                                              //
		enable:true,                                                                                                              //
		timer:'fc3d',                                                                                                             //
                                                                                                                                  //
		option:{                                                                                                                  //
			host:"www.500wan.com",                                                                                                //福
			timeout:50000,                                                                                                        //彩
			path: '/static/info/kaijiang/xml/sd/list10.xml',                                                                      //3D
			headers:{                                                                                                             //
				"User-Agent": "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0)"                                                //
			}                                                                                                                     //
		},                                                                                                                        //
		                                                                                                                          //
		parse:function(str){                                                                                                      //
			try{                                                                                                                  //
				str=str.substr(0,300);                                                                                            //
				var m;                                                                                                            //
				var reg=/<row expect="(\d+?)" opencode="([\d\,]+?)" opentime="([\d\:\- ]+?)" trycode="[\d\,]*?" tryinfo="" \/>/;  //
                                                                                                                                  //
				if(m=str.match(reg)){                                                                                             //
					return {                                                                                                      //
						type:9,                                                                                                   //
						time:m[3],                                                                                                //
						number:m[1],                                                                                              //
						data:m[2]                                                                                                 //
					};                                                                                                            //
				}                                                                                                                 //
			}catch(err){                                                                                                          //
				throw('福彩3D解析数据不正确');                                                                                    //
			}                                                                                                                     //
		}                                                                                                                         //
	},                                                                                                                            //
	                                                                                                                              //
	{                                                                                                                             //
		title:'排列3',                                                                                                            //排
		source:'香雨娱乐平台',                                                                                                    //列
		name:'pl3',                                                                                                              //3
		enable:true,                                                                                                              //
		timer:'pl3',                                                                                                             //
                                                                                                                                  //
		option:{                                                                                                                  //
			host:"www.500wan.com",                                                                                                //
			timeout:50000,                                                                                                        //
			path: '/static/info/kaijiang/xml/pls/list10.xml',                                                                     //
			headers:{                                                                                                             //
				"User-Agent": "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0)"                                                //
			}                                                                                                                     //
		},                                                                                                                        //
		                                                                                                                          //
		parse:function(str){                                                                                                      //
			try{                                                                                                                  //
				str=str.substr(0,300);                                                                                            //
				var m;	                                                                                                          //
				var reg=/<row expect="(\d+?)" opencode="([\d\,]+?)" opentime="([\d\:\- ]+?)"/;                                    //
				if(m=str.match(reg)){                                                                                             //
					return {                                                                                                      //
						type:10,                                                                                                  //
						time:m[3],                                                                                                //
						number:20+m[1],                                                                                           //
						data:m[2]                                                                                                 //
					};                                                                                                            //
				}                                                                                                                 //
			}catch(err){                                                                                                          //
				throw('排3解析数据不正确');                                                                                       //
			}                                                                                                                     //
		}                                                                                                                         //
	},                                                                                                                            //
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

 
																												//系
														//
	                                        	//
		{                                                                                                         	//
		title:'三分pk10',                                                                                     	//
		source:'杏彩',                                                                                        	//
		name:'twpk10',                                                                                         	//
		enable:true,                                                                                          	//
		timer:'twpk10',                                                                                        	//
		option:{                                                                                              	//
			host:"127.0.0.1",                                                                                   	//
			timeout:50000,                                                                                    	//
			path: '/index.php/xingcai/xcsfpk10',                                                              	//
			headers:{                                                                                         	//
				"User-Agent": "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0) "                           	//
			}                                                                                                 	//
		},                                                                                                    	//
		parse:function(str){                                                                                  	//
			try{                                                                                              	//
				str=str.substr(0,200);	                                                                      	//
				var reg=/<row expect="([\d\-]+?)" opencode="([\d\,]+?)" opentime="([\d\:\- ]+?)"/;            	//
				var m;                                                                                        	//杏
				if(m=str.match(reg)){                                                                         	//彩
					return {                                                                                  	//系
						type:85,                                                                              	//统
						time:m[3],                                                                            	//彩
						number:m[1],                                                                          	//
						data:m[2]                                                                             	//
					};                                                                                        	//
				}					                                                                          	//
			}catch(err){                                                                                      	//
				throw('三分pk10解析数据不正确');                                                              	//
			}                                                                                                 	//
		}                                                                                                     	//
	},
	{                                                                                                         	//
		title:'3分彩',                                                                                    	//
		source:'杏彩',                                                                                        	//
		name:'sfssc',                                                                                         	//
		enable:true,                                                                                          	//
		timer:'sfssc',                                                                                        	//
		option:{                                                                                              	//
			host:"127.0.0.1",                                                                                   	//
			timeout:50000,                                                                                    	//
			path: '/index.php/xingcai/xcsfssc',                                                                 	//
			headers:{                                                                                         	//
				"User-Agent": "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0) "                           	//
			}                                                                                                 	//
		},                                                                                                    	//
		parse:function(str){                                                                                  	//
			try{                                                                                              	//
				str=str.substr(0,200);	                                                                      	//
				var reg=/<row expect="([\d\-]+?)" opencode="([\d\,]+?)" opentime="([\d\:\- ]+?)"/;            	//
				var m;                                                                                        	//
				if(m=str.match(reg)){                                                                         	//
					return {                                                                                  	//
						type:86,                                                                              	//
						time:m[3],                                                                            	//
						number:m[1],                                                                          	//
						data:m[2]                                                                             	//
					};                                                                                        	//
				}					                                                                          	//
			}catch(err){                                                                                      	//杏
				throw('河内5分彩解析数据不正确');                                                             	//彩
			}                                                                                                 	//系
		}                                                                                                     	//统
	},																											//
	{                                                                                                         	//
		title:'河内5分彩',                                                                                    	//
		source:'杏彩',                                                                                        	//
		name:'qtllc',                                                                                         	//
		enable:true,                                                                                          	//
		timer:'qtllc',                                                                                        	//
		option:{                                                                                              	//
			host:"127.0.0.1",                                                                                   	//
			timeout:50000,                                                                                    	//
			path: '/index.php/xingcai/xc5fc',                                                                 	//
			headers:{                                                                                         	//
				"User-Agent": "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0) "                           	//
			}                                                                                                 	//
		},                                                                                                    	//
		parse:function(str){                                                                                  	//
			try{                                                                                              	//
				str=str.substr(0,200);	                                                                      	//
				var reg=/<row expect="([\d\-]+?)" opencode="([\d\,]+?)" opentime="([\d\:\- ]+?)"/;            	//
				var m;                                                                                        	//
				if(m=str.match(reg)){                                                                         	//
					return {                                                                                  	//
						type:14,                                                                              	//
						time:m[3],                                                                            	//
						number:m[1],                                                                          	//
						data:m[2]                                                                             	//
					};                                                                                        	//
				}					                                                                          	//
			}catch(err){                                                                                      	//杏
				throw('河内5分彩解析数据不正确');                                                             	//彩
			}                                                                                                 	//系
		}                                                                                                     	//统
	},	     /*                                                                                                 	//彩
																												//
	{                                                                                                         	//
		title:'河内2分彩',                                                                                    	//
		source:'杏彩',                                                                                        	//
		name:'lfc',                                                                                           	//
		enable:true,                                                                                          	//
		timer:'lfc',                                                                                          	//
		option:{                                                                                              	//
			host:"122.114.211.132",                                                                                   	//
			timeout:50000,                                                                                    	//
			path: '/index.php/xingcai/xc2fc',                                                                 	//
			headers:{                                                                                         	//
				"User-Agent": "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0) "                           	//
			}                                                                                                 	//
		},                                                                                                    	//
		parse:function(str){                                                                                  	//
			try{                                                                                              	//
				str=str.substr(0,200);	                                                                      	//
				var reg=/<row expect="([\d\-]+?)" opencode="([\d\,]+?)" opentime="([\d\:\- ]+?)"/;            	//
				var m;                                                                                        	//
				if(m=str.match(reg)){                                                                         	//
					return {                                                                                  	//
						type:26,                                                                              	//
						time:m[3],                                                                            	//
						number:m[1],                                                                          	//
						data:m[2]                                                                             	//
					};                                                                                        	//
				}					                                                                          	//
			}catch(err){                                                                                      	//
				throw('河内2分彩解析数据不正确');                                                             	//
			}                                                                                                 	//
		}                                                                                                     	//
	},		 */                                                                                                   	//
		{
        title:'安徽快3',
		source:'安徽快3',
		name:'ahk3',
		enable:true,
		timer:'ahk3',

		option:{
			host:"www.cailele.com",
			timeout:30000,
			path: '/static/ahk3/newlyopenlist.xml',
			headers:{
				"User-Agent": "Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/28.0.1271.64 Safari/537.11"
			}
		},
		
		parse:function(str){
			//return getFromCalilecWeb(str,15);
			try{
				str=str.substr(0,200);
				var reg=/<row expect="(\d+?)" opencode="([\d\,]+?)" opentime="([\d\:\- ]+?)"/; 
				var m;
				if(m=str.match(reg)){
					return {
						type:81,
						time:m[3],
						number:m[1].replace(/^(\d{8})(\d{2})$/, '$1-0$2'),
						data:m[2]
					};
				}					
			}catch(err){
				throw('安徽快3解析数据不正确');
			}
		}
	},
	{
		 title:'广西快3娱乐平台',
		source:'广西快3娱乐平台',
		name:'gxk3',
		enable:true,
		timer:'gxk3',
 

		option:{
			host:"www.cailele.com",
			timeout:50000,
			path: '/static/gxk3/newlyopenlist.xml',
			headers:{
				"User-Agent": "Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/28.0.1271.64 Safari/537.11"
			}
		},
		
		parse:function(str){
			try{
				//return getFromCaileWeb(str,15);
				str=str.substr(0,200);
				var reg=/<row expect="(\d+?)" opencode="([\d\,]+?)" opentime="([\d\:\- ]+?)"/; 
				var m;
	
				if(m=str.match(reg)){
					return {
						type:82,
						time:m[3],
						number:m[1].replace(/^(\d{8})(\d{3})$/, '$1-$2'),
						data:m[2]
					};
				}					
			}catch(err){
				throw('广西快3解析数据不正确');
			}
		}
	},////////////																											//
	{                                                                                                         	//
		title:'河内1分彩',                                                                                    	//
		source:'杏彩',                                                                                        	//
		name:'ffc',                                                                                           	//
		enable:true,                                                                                          	//
		timer:'ffc',                                                                                          	//
		option:{                                                                                              	//杏
			host:"127.0.0.1",                                                                                   	//彩
			timeout:50000,                                                                                    	//系
			path: '/index.php/xingcai/xcffc',                                                                 	//统
			headers:{                                                                                         	//彩
				"User-Agent": "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0) "                           	//
			}                                                                                                 	//
		},                                                                                                    	//
		parse:function(str){                                                                                  	//
			try{                                                                                              	//
				str=str.substr(0,200);	                                                                      	//
				var reg=/<row expect="([\d\-]+?)" opencode="([\d\,]+?)" opentime="([\d\:\- ]+?)"/;            	//
				var m;                                                                   	//
				if(m=str.match(reg)){                                                                         	//
					return {                                                                                  	//
						type:5,                                                                               	//
						time:m[3],                                                                            	//
						number:m[1],                                                                          	//
						data:m[2]                                                                             	//
					};                                                                                        	//
				}					                                                                          	//
			}catch(err){                                                                                      	//
				throw('河内1分彩解析数据不正确');                                                             	//
			}                                                                                                 	//
		}                                                                                                     	//
	},	    /*                                                                                                   	//
																												//
	{                                                                                                         	//
		title:'河内2分彩',                                                                                    	//
		source:'杏彩',                                                                                        	//
		name:'lfc',                                                                                           	//
		enable:true,                                                                                          	//
		timer:'lfc',                                                                                          	//
		option:{                                                                                              	//
			host:"122.114.211.132",                                                                                   	//
			timeout:50000,                                                                                    	//
			path: '/index.php/xingcai/xc2fc',                                                                 	//杏
			headers:{                                                                                         	//彩
				"User-Agent": "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0) "                           	//系
			}                                                                                                 	//统
		},                                                                                                    	//彩
		parse:function(str){                                                                                  	//
			try{                                                                                              	//
				str=str.substr(0,200);	                                                                      	//
				var reg=/<row expect="([\d\-]+?)" opencode="([\d\,]+?)" opentime="([\d\:\- ]+?)"/;            	//
				var m;                                                                                        	//
				if(m=str.match(reg)){                                                                         	//
					return {                                                                                  	//
						type:26,                                                                              	//
						time:m[3],                                                                            	//
						number:m[1],                                                                          	//
						data:m[2]                                                                             	//
					};                                                                                        	//
				}					                                                                          	//
			}catch(err){                                                                                      	//
				throw('河内2分彩解析数据不正确');                                                             	//
			}                                                                                                 	//
		}                                                                                                     	//
	},	 */   
	{                                                                                                         	//
		title:'幸运28',                                                                                    	//
		source:'杏彩',                                                                                        	//
		name:'xy28',                                                                                           	//
		enable:true,                                                                                          	//
		timer:'xy28',                                                                                          	//
		option:{                                                                                              	//杏
			host:"127.0.0.1",                                                                                   	//彩
			timeout:50000,                                                                                    	//系
			path: '/index.php/xingcai/xy28',                                                                 	//统
			headers:{                                                                                         	//彩
				"User-Agent": "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0) "                           	//
			}                                                                                                 	//
		},                                                                                                    	//
		parse:function(str){                                                                                  	//
			try{                                                                                              	//
				str=str.substr(0,200);	                                                                      	//
				var reg=/<row expect="([\d\-]+?)" opencode="([\d\,]+?)" opentime="([\d\:\- ]+?)"/;            	//
				var m;                                                                   	//
				if(m=str.match(reg)){                                                                         	//
					return {                                                                                  	//
						type:80,                                                                               	//
						time:m[3],                                                                            	//
						number:m[1],                                                                          	//
						data:m[2]                                                                             	//
					};                                                                                        	//
				}					                                                                          	//
			}catch(err){                                                                                      	//
				throw('幸运28解析数据不正确');                                                             	//
			}                                                                                                 	//
		}                                                                                                     	//
	},
	{                                                                                                         	//
		title:'北京28',                                                                                    	//
		source:'杏彩',                                                                                        	//
		name:'bj28',                                                                                           	//
		enable:true,                                                                                          	//
		timer:'bj28',                                                                                          	//
		option:{                                                                                              	//杏
			host:"127.0.0.1",                                                                                   	//彩
			timeout:50000,                                                                                    	//系
			path: '/index.php/Kl8/bj28?type=83',                                                                 	//统
			headers:{                                                                                         	//彩
				"User-Agent": "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0) "                           	//
			}                                                                                                 	//
		},                                                                                                    	//
		parse:function(str){                                                                                  	//
			try{                                                                                              	//
				str=str.substr(0,200);	                                                                      	//
				var reg=/<row expect="([\d\-]+?)" opencode="([\d\,]+?)" opentime="([\d\:\- ]+?)"/;            	//
				var m;                                                                   	//
				if(m=str.match(reg)){                                                                         	//
					var n1 = m[2].split(",")
						n1 = (Math.abs(n1[0])+Math.abs(n1[1])+Math.abs(n1[2])+Math.abs(n1[3])+Math.abs(n1[4])+Math.abs(n1[5]));
						n1 = n1.toString().slice(-1);
					var n2 = m[2].split(",")
						n2 = (Math.abs(n2[6])+Math.abs(n2[7])+Math.abs(n2[8])+Math.abs(n2[9])+Math.abs(n2[10])+Math.abs(n2[11]));
						n2 = n2.toString().slice(-1);
					var n3 = m[2].split(",")
						n3 = (Math.abs(n3[12])+Math.abs(n3[13])+Math.abs(n3[14])+Math.abs(n3[15])+Math.abs(n3[16])+Math.abs(n3[17]));
						n3 = n3.toString().slice(-1);
					var data = [n1,n2,n3].join(",");
					return {                                                                                  	//
						type:83,                                                                               	//
						time:m[3],                                                                            	//
						number:m[1],                                                                          	//
						data:data                                                                             	//
					};                                                                                        	//
				}					                                                                          	//
			}catch(err){                                                                                      	//
				throw('北京28解析数据不正确');                                                             	//
			}                                                                                                 	//
		}                                                                                                     	//
	},
	{
		title:'上海时时乐',
		source:'500wan',
		name:'shssl',
		enable:true,
		timer:'shssl',

		option:{
			host:"kaijiang.500.com",
			timeout:30000,
			path: '/static/public/ssl/xml/qihaoxml/',
			headers:{
				"User-Agent": "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; Win64; x64; Trident/4.0)"
			}
		},
		
		parse:function(str){
			try{
				str=str.substr(0,300);
				var m;
				var reg=/<row expect="([\d\:\- ]+?)" opencode="([\d\,]+?)" specail="" opentime="([\d\:\- ]+?)"\/>/;
				if(m=str.match(reg)){
					var number = m[1].substr(2,6)+"0"+m[1].substr(m[1].length-2,3);
					var data = {
						type:87,
						time:m[3],
						number:number,
						data:m[2]
					};
					return data;
				}					
			}catch(err){
				throw('上海时时乐解析数据不正确');
			}
		}
	},
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
{                                                                                                                                             //
		title: '六合彩',                                                                                                                      //
		source: '9800开奖网',                                                                                                                 //
		name: 'hklhc',                                                                                                                        //
		enable:true,                                                                                                                         //
		timer: 'hklhc',                                                                                                                       //
		stype: 34,                                                                                                                            //
		option: {                                                                                                                             //
			host: "www.9800.com.tw",                                                                                                          //
			timeout: 50000,                                                                                                                   //香
			path: '/html/a6/',                                                                                                                //港
			hhost: "www.9800.com.tw",                                                                                                         //六
			npath: '/html/a6/',                                                                                                               //合
			headers: {                                                                                                                        //彩
				"User-Agent": "Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/22.0.1271.64 Safari/537.11"      //
			}                                                                                                                                 //
		},                                                                                                                                    //
		parse: function(str) {                                                                                                                //
			try {                                                                                                                             //
				return getFrom9800(str, 34);                                                                                                  //
			} catch (err) {}                                                                                                                  //
		},                                                                                                                                    //
		reparse: function(bet) {                                                                                                              //
			try {                                                                                                                             //
				log(bet.actionNo);                                                                                                            //
				return reparseFrom9800(bet, 34);                                                                                              //
			} catch (err) {                                                                                                                   //
                                                                                                                                              //
			}                                                                                                                                 //
                                                                                                                                              //
		},                                                                                                                                    //
	}                                                                                                                                          //
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
];                                                                                                              

// 出错时等待 15                                                                                                
exports.errorSleepTime=15;                                                                                      

// 重启时间间隔，以小时为单位，0为不重启
//exports.restartTime=0.4;
exports.restartTime=0;

exports.submit={

	host:'localhost',
	path:'/index.php/dataSource/kj'
}

exports.dbinfo={
	host:'127.0.0.1',
	user:'dadi',
	password:'dadi163.com',
	database:'dadicp',
	'multipleStatements': true
}

global.log=function(log){
	var date=new Date();
	console.log('['+date.toDateString() +' '+ date.toLocaleTimeString()+'] '+log)
}

function getFromXJFLCPWeb(str, type){
	str=str.substr(str.indexOf('<td><a href="javascript:detatilssc'), 300).replace(/[\r\n]+/g,'');
         
	var reg=/(\d{10}).+(\d{2}\:\d{2}).+<p>([\d ]{9})<\/p>/,
	match=str.match(reg);
	
	if(!match) throw new Error('数据不正确');
	//console.log('期号：%s，开奖时间：%s，开奖数据：%s', match[1], match[2], match[3]);
	
	try{
		var data={
			type:type,
			time:match[1].replace(/^(\d{4})(\d{2})(\d{2})\d{2}/, '$1-$2-$3 ')+match[2],
			number:match[1].replace(/^(\d{8})(\d{2})$/, '$1-$2'),
			data:match[3].split(' ').join(',')
		};
		//console.log(data);
		return data;
	}catch(err){
		throw('解析数据失败');
	}
}


function getCQsscGw(str, type,gameName){
	


	str = str.substr(str.indexOf('name="description"'),100).replace(/[\r\n]+/g,'');
	var reg =new RegExp(gameName+"第(\\d+-\\d+)期开奖号码:(\\d+),开奖时间",""); 
	
	var match=str.match(reg);
	
	if(!match) throw new Error('-------------------------'+gameName+'官网数据不正确');
	

	var ano =  match[1];
	
	var data= match[2]+'';
	var data = data.split("").join(',');
	
	var myDate = new Date();
	var year = myDate.getFullYear();       //年   
    var month = myDate.getMonth() + 1;     //月   
    var day = myDate.getDate();            //日
	if(month < 10) month="0"+month;
	if(day < 10) day="0"+day;
	var mytime=year + "-" + month + "-" + day + " " +myDate.toLocaleTimeString();
	
	
	
	try{
		var data={
			type:type,
			time:mytime,
			number:ano,
			data:data
		}
		
	//	console.log(gameName);
		//console.log(data);
		return data;
	}catch(err){
		throw('解析'+gameName+'官网数据失败');
	}
}

function getFrom9800(str, type) {

	str = str.substr(str.indexOf('bai12'), 560);


	var reg = /<TD bgColor=#f6f6f6 align="center">(\d+)<\/TD>[\s\S].*?<TD align=middle>(.*?)<\/TD>[\s\S].*?<TD align=middle>[\s\S].*?<font color="#FF0000"><b>(\d+) (\d+) (\d+) (\d+) (\d+) (\d+)<\/b><\/font>[\s\S].*?\+ <b><font color="#009933">(\d+)<\/font><\/b>/,
		match = str.match(reg);

	var myDate = new Date();
	var year = myDate.getFullYear(); //年
	var month = myDate.getMonth() + 1; //月
	var day = myDate.getDate(); //日
	if (month < 10) month = "0" + month;
	if (day < 10) day = "0" + day;
	var mytime = match[2] + " " + myDate.toLocaleTimeString();
	try {
		var data = {
			type: type,
			time: mytime,
			number: match[1]
		}

		data.data = match[3] + "," + match[4] + "," + match[5] + "," + match[6] + "," + match[7] + "," + match[8] + "," + match[9];

		//console.log(data);
		return data;
	} catch (err) {
		throw ('解析数据失败');
	}

}

function getCQssc(str, type){
	
	str = str.substr(str.indexOf('id="n_cqssc"'),700).replace(/[\r\n]+/g,'');
	
	
	var reg =/value="(\d)"/g;
	
	//var reg=/<td>(\d+)<\/td>[\s\S]*?<td>(.*)<\/td>[\s\S]*?<td>([\d\:\- ]+?)<\/td>[\s\S]*?<\/tr>/,
	var data='';
	while(reg.test(str)){
		data+=RegExp.$1+",";
		
		}
	
	if(data.length==0){
		throw new Error('重庆时时彩数据不正确');
		
	}
	data=data.substr(0,data.length-1);
	reg=/<td class="qihao">(\d+)[\s\S]*?<\/td>/;
	var match=str.match(reg);
	if(!match) throw new Error('重庆时时彩数据不正确');
	
	var myDate = new Date();
	var year = myDate.getFullYear();       //年   
    var month = myDate.getMonth() + 1;     //月   
    var day = myDate.getDate();            //日
	if(month < 10) month="0"+month;
	if(day < 10) day="0"+day;
	var mytime=year + "-" + month + "-" + day + " " +myDate.toLocaleTimeString();
	var ano = match[1];
	

	if(ano.length==7) ano=year+ano.replace(/(\d{8})(\d{3})/,'$1-$2');
	if(ano.length==6) ano=year+ano.replace(/(\d{4})(\d{2})/,'$1-0$2');
	if(ano.length==9) ano='20'+ano.replace(/(\d{6})(\d{2})/,'$1-$2');
	if(ano.length==10) ano=ano.replace(/(\d{8})(\d{2})/,'$1-0$2');
	var mynumber=ano.replace(/(\d{8})(\d{3})/,'$1-$2');
	
	try{
		var data={
			type:type,
			time:mytime,
			number:mynumber,
			data:data
		}
		
	
	
		return data;
	}catch(err){
		throw('解析重庆时时彩数据失败');
	}
}

function getFromshishicai(str, type){
	str=str.substr(str.indexOf('<th class="borRB">'),380);
	var reg=/<th class=".*?">[\s\S]*?<\/th>[\s\S]*?<th class=".*?">[\s\S]*?<\/th>[\s\S]*?<tr><td class=".*?">([\d+\-]+?)<\/td><td class=".*?">(\d+)<\/td><\/tr>/,
	match=str.match(reg);
	var myDate = new Date();
	var year = myDate.getFullYear();       //年   
    var month = myDate.getMonth() + 1;     //月   
    var day = myDate.getDate();            //日
	if(month < 10) month="0"+month;
	if(day < 10) day="0"+day;
	var mytime=year + "-" + month + "-" + day + " " +myDate.toLocaleTimeString();
	    try{
			var data={
				type:type,
				time:mytime,
				number:match[1],
				data:match[2].split('').join(',')
			}
			return data;
		}catch(err){
			throw('解析数据失败');
		}
}

function getFromCaileleWeb(str, type, slen){
	if(!slen) slen=380;
	str=str.substr(str.indexOf('<tr bgcolor="#FFFAF3">'),slen);
	//console.log(str);
	var reg=/<td.*?>(\d+)<\/td>[\s\S]*?<td.*?>([\d\- \:]+)<\/td>[\s\S]*?<td.*?>((?:[\s\S]*?<div class="ball_yellow">\d+<\/div>){3,5})\s*<\/td>/,
	match=str.match(reg);
	if(match.length>1){
		
		if(match[1].length==7) match[1]='2014'+match[1].replace(/(\d{4})(\d{3})/,'$1-$2');
		if(match[1].length==8){
			if(parseInt(type)!=11){
				match[1]='20'+match[1].replace(/(\d{6})(\d{2})/,'$1-0$2');
			}else{match[1]='20'+match[1].replace(/(\d{6})(\d{2})/,'$1-$2');}
		}
		if(match[1].length==9) match[1]='20'+match[1].replace(/(\d{6})(\d{2})/,'$1-$2');
		if(match[1].length==10) match[1]=match[1].replace(/(\d{8})(\d{2})/,'$1-0$2');
		var mynumber=match[1].replace(/(\d{8})(\d{3})/,'$1-$2');
	try{
		var data={
			type:type,
			time:match[2],
			number:mynumber
		}
		
		reg=/<div.*>(\d+)<\/div>/g;
		data.data=match[3].match(reg).map(function(v){
			var reg=/<div.*>(\d+)<\/div>/;
			return v.match(reg)[1];
		}).join(',');
		
		//console.log(data);
		return data;
	}catch(err){
		throw('解析数据失败');
	}
   }
}

function getFromPK103(str, type){

str=str.substr(str.indexOf('<div class="lott_cont">'),350).replace(/[\r\n]+/g,'');
   // console.log(str);
var reg=/[\s\S]*?<td>(\d+)<\/td>[\s\S]*?<td>(.*)<\/td>[\s\S]*?<td>([\d\:\- ]+?)<\/td>/,
match=str.match(reg);
if(!match) throw new Error('数据不正确');
//console.log(match);
try{
var data={
type:type,
time:match[3],
number:match[1].replace(/^(\d{8})(\d{2})$/, '$1-$2'),
data:match[2]
};
//console.log(data);
return data;
}catch(err){
throw('解析数据失败');
}

}


function getFrom360CP(str, type){

	str=str.substr(str.indexOf('<em class="red" id="open_issue">'),380);
	//console.log(str);
	var reg=/[\s\S]*?(\d+)<\/em>[\s\S].*?<ul id="open_code_list">((?:[\s\S]*?<li class=".*?">\d+<\/li>){3,5})[\s\S]*?<\/ul>/,
	match=str.match(reg);
	var myDate = new Date();
	var year = myDate.getFullYear();       //年   
    var month = myDate.getMonth() + 1;     //月   
    var day = myDate.getDate();            //日
	if(month < 10) month="0"+month;
	if(day < 10) day="0"+day;
	var mytime=year + "-" + month + "-" + day + " " +myDate.toLocaleTimeString();
	//console.log(match);
	if(match.length>1){
		
		if(match[1].length==7) match[1]='2014'+match[1].replace(/(\d{4})(\d{3})/,'$1-$2');
		if(match[1].length==8) match[1]='20'+match[1].replace(/(\d{6})(\d{2})/,'$1-0$2');
		if(match[1].length==9) match[1]='20'+match[1].replace(/(\d{6})(\d{2})/,'$1-$2');
		if(match[1].length==10) match[1]=match[1].replace(/(\d{8})(\d{2})/,'$1-0$2');
		var mynumber=match[1].replace(/(\d{8})(\d{3})/,'$1-$2');
		
		try{
			var data={
				type:type,
				time:mytime,
				number:mynumber
			}
			
			reg=/<li class=".*?">(\d+)<\/li>/g;
			data.data=match[2].match(reg).map(function(v){
				var reg=/<li class=".*?">(\d+)<\/li>/;
				return v.match(reg)[1];
			}).join(',');
			
			//console.log(data);
			return data;
		}catch(err){
			throw('解析数据失败');
		}
	}
}

function getFromBDCP(str, type){

	var rawdata=str.substr(str.indexOf('var latest_draw_result'),100).replace(/[\r\n]+/g,''),
	rawnumber=str.substr(str.indexOf('var latest_draw_phase'),100).replace(/[\r\n]+/g,''),
	rawtime=str.substr(str.indexOf('var latest_draw_time'),100).replace(/[\r\n]+/g,''),
	regdata=/"(\d{2})","(\d{2})","(\d{2})","(\d{2})","(\d{2})","(\d{2})","(\d{2})","(\d{2})","(\d{2})","(\d{2})"/,
	regnumber=/(\d{6})/,
	//regtime=/(\d{4}-\d{2}-\d{2})/,
	regtime =/(\d{4}-\d{2}-\d{2}\W\d{2}:\d{2}:\d{2})/,
	matchdata=rawdata.match(regdata),
	matchnumber=rawnumber.match(regnumber),
	matchtime=rawtime.match(regtime);

	if(!matchdata) throw new Error('数据不正确');
	var data = matchdata[1] + ',' + matchdata[2] + ',' + matchdata[3] + ',' + matchdata[4] + ',' + matchdata[5] + ',' + matchdata[6] + ',' + matchdata[7] + ',' + matchdata[8] + ',' + matchdata[9] + ',' + matchdata[10]
	try{
		var data={
			type:type,
			time:matchtime[1],
			number:matchnumber[1],
			data:data
		};
		return data;
	}catch(err){
		throw('解析数据失败');
	}
	
}

function getFromPK10(str, type){

	str=str.substr(str.indexOf('<div class="lott_cont">'),350).replace(/[\r\n]+/g,'');
    //console.log(str);
	var reg=/<tr class=".*?">[\s\S]*?<td>(\d+)<\/td>[\s\S]*?<td>(.*)<\/td>[\s\S]*?<td>([\d\:\- ]+?)<\/td>[\s\S]*?<\/tr>/,
	match=str.match(reg);
	if(!match) throw new Error('数据不正确');
	//console.log(match);
	try{
		var data={
			type:type,
			time:match[3],
			number:match[1],
			data:match[2]
		};
		//console.log(data);
		return data;
	}catch(err){
		throw('解析数据失败');
	}
	
}

function getFromK8(str, type){

	str=str.substr(str.indexOf('<div class="lott_cont">'),450).replace(/[\r\n]+/g,'');
    //console.log(str);
	var reg=/<tr class=".*?">[\s\S]*?<td>(\d+)<\/td>[\s\S]*?<td>(.*)<\/td>[\s\S]*?<td>(.*)<\/td>[\s\S]*?<td>([\d\:\- ]+?)<\/td>[\s\S]*?<\/tr>/,
	match=str.match(reg);
	if(!match) throw new Error('数据不正确');
	//console.log(match);
	try{
		var data={
			type:type,
			time:match[4],
			number:match[1],
			data:match[2]+'|'+match[3]
		};
		//console.log(data);
		return data;
	}catch(err){
		throw('解析数据失败');
	}
	
}


function getFromCJCPWeb(str, type){

	//console.log(str);
	str=str.substr(str.indexOf('<table class="qgkj_table">'),1200);
	
	//console.log(str);
	
	var reg=/<tr>[\s\S]*?<td class=".*">(\d+).*?<\/td>[\s\S]*?<td class=".*">([\d\- \:]+)<\/td>[\s\S]*?<td class=".*">((?:[\s\S]*?<input type="button" value="\d+" class=".*?" \/>){3,5})[\s\S]*?<\/td>/,
	match=str.match(reg);
	
	//console.log(match);
	
	if(!match) throw new Error('数据不正确');
	try{
		var data={
			type:type,
			time:match[2],
			number:match[1].replace(/(\d{8})(\d{2})/,'$1-0$2')
		}
		
		reg=/<input type="button" value="(\d+)" class=".*?" \/>/g;
		data.data=match[3].match(reg).map(function(v){
			var reg=/<input type="button" value="(\d+)" class=".*?" \/>/;
			return v.match(reg)[1];
		}).join(',');
		
		//console.log(data);
		return data;
	}catch(err){
		throw('解析数据失败');
	}
	
}

function getFromCaileleWeb_1(str, type){
	str=str.substr(str.indexOf('<tbody id="openPanel">'), 120).replace(/[\r\n]+/g,'');
         
	var reg=/<tr.*?>[\s\S]*?<td.*?>(\d+)<\/td>[\s\S]*?<td.*?>([\d\:\- ]+?)<\/td>[\s\S]*?<td.*?>([\d\,]+?)<\/td>[\s\S]*?<\/tr>/,
	match=str.match(reg);
	if(!match) throw new Error('数据不正确');
	//console.log(match);
	var number,_number,number2;
	var d = new Date();
	var y = d.getFullYear();
	if(match[1].length==9 || match[1].length==8){number='20'+match[1];}else if(match[1].length==7){number='2014'+match[1];}else{number=match[1];}
	_number=number;
	if(number.length==11){number2=number.replace(/^(\d{8})(\d{3})$/, '$1-$2');}else{number2=number.replace(/^(\d{8})(\d{2})$/, '$1-0$2');_number=number.replace(/^(\d{8})(\d{2})$/, '$10$2');}
	try{
		var data={
			type:type,
			time:_number.replace(/^(\d{4})(\d{2})(\d{2})\d{3}/, '$1-$2-$3 ')+match[2],
			number:number2,
			data:match[3]
		};
		//console.log(data);
		return data;
	}catch(err){
		throw('解析数据失败');
	}
}

function getFrom360sd11x5(str, type){

	str=str.substr(str.indexOf('<em class="red" id="open_issue">'),380);
	//console.log(str);
	var reg=/[\s\S]*?(\d+)<\/em>[\s\S].*?<ul id="open_code_list">((?:[\s\S]*?<li class=".*?">\d+<\/li>){3,5})[\s\S]*?<\/ul>/,
	match=str.match(reg);
	var myDate = new Date();
	var year = myDate.getFullYear();       //年   
    var month = myDate.getMonth() + 1;     //月   
    var day = myDate.getDate();            //日
	if(month < 10) month="0"+month;
	if(day < 10) day="0"+day;
	var mytime=year + "-" + month + "-" + day + " " +myDate.toLocaleTimeString(); 
	//console.log(mytime);
	//console.log(match);
	
	if(!match) throw new Error('数据不正确');
	try{
		var data={
			type:type,
			time:mytime,
			number:match[1].replace(/(\d{8})(\d{2})/,'$1-0$2')
		}
		
		reg=/<li class=".*?">(\d+)<\/li>/g;
		data.data=match[2].match(reg).map(function(v){
			var reg=/<li class=".*?">(\d+)<\/li>/;
			return v.match(reg)[1];
		}).join(',');
		
		//console.log(data);
		return data;
	}catch(err){
		throw('解析数据失败');
	}
}

function getFromCaileleWeb_2(str, type){

	str=str.substr(str.indexOf('<tbody id="openPanel">'), 500).replace(/[\r\n]+/g,'');
	//console.log(str);
	var reg=/<tr>[\s\S]*?<td>(\d+)<\/td>[\s\S]*?<td>([\d\:\- ]+?)<\/td>[\s\S]*?<td>([\d\,]+?)<\/td>[\s\S]*?<\/tr>/,
	match=str.match(reg);
	if(!match) throw new Error('数据不正确');
	//console.log(match);
	var number,_number,number2;
	var d = new Date();
	var y = d.getFullYear();
	if(match[1].length==9 || match[1].length==8){number='20'+match[1];}else if(match[1].length==7){number='2014'+match[1];}else{number=match[1];}
	_number=number;
	if(number.length==11){number2=number.replace(/^(\d{8})(\d{3})$/, '$1-$2');}else{number2=number.replace(/^(\d{8})(\d{2})$/, '$1-0$2');_number=number.replace(/^(\d{8})(\d{2})$/, '$10$2');}
	try{
		var data={
			type:type,
			time:_number.replace(/^(\d{4})(\d{2})(\d{2})\d{3}/, '$1-$2-$3 ')+match[2],
			number:number2,
			data:match[3]
		};
		//console.log(data);
		return data;
	}catch(err){
		throw('解析数据失败');
	}
}