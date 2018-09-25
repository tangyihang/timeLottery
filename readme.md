
# node服务命令
- 启动

pm2 restart node data.js --name kj 
- 查询 

pm2 ls
- 日志

pm2 log

# TODO
* [ ] 未完成的办事列表
    * [ ] 充值记录里显示充值来源
    * [ ] 开奖结果爬取（爬取网站https://1680118.com）
        * [ ] 六合彩开奖结果爬取
            https://1680660.com/smallSix/findSmallSixHistory.do （POST传值）
        * [ ] 重庆时时彩开奖结果爬取
            https://api.api68.com/CQShiCai/getBaseCQShiCaiList.do?lotCode=10002
        * [ ] 北京PK拾开奖结果爬取
            https://api.api68.com/pks/getPksHistoryList.do?lotCode=10001
    * [ ] 银行充值调试
    * [ ] 盈亏报表只能查最近的（不紧急）
* [x] 已完成事项列表
    * [x] 绑定提款卡号调试
        * [x] 嵌套的完成事宜列表
