var CD_newSortArr = [
        {"id":"51","name":"三分时时彩"},
        {"id":"5","name":"重庆时时彩"},
        {"id":"9","name":"北京PK拾"},
        {"id":"42","name":"幸运28"},
        {"id":"52","name":"三分PK拾"},
        {"id":"18","name":"香港⑥合彩"},
        {"id":"15","name":"广东11选5"},
        {"id":"7","name":"新疆时时彩"},
        {"id":"12","name":"山东11选5"},
        {"id":"4","name":"天津时时彩"},
        {"id":"13","name":"上海11选5"},
        {"id":"14","name":"江西11选5"},
        {"id":"11","name":"安徽快三"},
        {"id":"17","name":"广西快三"},
        {"id":"10","name":"江苏快三"},
        {"id":"16","name":"吉林快三"},
        {"id":"1","name":"福彩3d"},
        {"id":"3","name":"上海时时乐"},
        {"id":"2","name":"排列三"},
        {"id":"41","name":"北京28"}
    ];
// newSortArr 相当于 数据字典： 数组元素的顺序 即为 彩种 期望的 排序的 顺序 ( 注：这里的 name 并未被代码使用，仅增加可读性方便后期排序的扩展 )
function  _getlotteryIDindex(CD_newSortArr)
{
    var lll = CD_newSortArr.length;
    var obj = {count:lll};
    for( var i=0; i<lll; i++ )
    {
        obj[CD_newSortArr[i].id] = i;
    }
    return obj;
}
