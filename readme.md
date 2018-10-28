
# node服务命令
- 启动

pm2 start node data.js --name kj 
- 查询 

pm2 ls
- 日志

pm2 log

# TODO
* [ ] 未完成的办事列表
    * [ ] 充值记录里显示充值来源
    * [x] 开奖结果爬取（爬取网站https://1680118.com）
        * [x] 六合彩开奖结果爬取
            https://1680660.com/smallSix/findSmallSixHistory.do （POST传值）
        * [x] 重庆时时彩开奖结果爬取
            https://api.api68.com/CQShiCai/getBaseCQShiCaiList.do?lotCode=10002
        * [x] 北京PK拾开奖结果爬取
            https://api.api68.com/pks/getPksHistoryList.do?lotCode=10001
    * [x] 银行充值调试
    * [ ] 盈亏报表只能查最近的（不紧急）
    * [ ] 后台澳门快三赔率设置
    * [ ] 前台澳门快三赔率更改
    * [ ] 查看其它赔率是否有问题，有问题就去掉这个彩种
    * [ ] 走势图修改
* [x] 已完成事项列表
    * [x] 绑定提款卡号调试
        * [x] 嵌套的完成事宜列表
