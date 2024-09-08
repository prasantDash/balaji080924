(()=>{
    let purches = {
        maximumRecord:8,
        offsetData:0,
        maxPageoffset:0,                      
        getPurchesList: () => {
            $.ajax({
                url: APP_URL+'/btob/purches/getPurchesList',
                type: "POST",
                data : {
                    "_token"     : $('#csrf-token')[0].content,
                    "maxData"    :purches.maximumRecord,
                    "offsetData" :purches.offsetData
                },
                success: function(data){
                    console.log();
                    let resData = data.data;
                    let tableData = '';
                    resData.map((a)=>{
                        console.log(a);
                        tableData += '<tr>';
                        tableData += '<td>'+a.id+'</td>';
                        tableData += '<td>'+formattNumber(a.amount.toFixed(2))+'</td>';
                        tableData += '<td>'+a.productdetail.proname+'</td>';
                        tableData += '<td>'+a.purchesitem.itemname+' - '+a.purchescarat.itemcarat+'</td>';
                        tableData += '<td>'+a.weight+'</td>';
                        tableData += '<td>'+a.less+'</td>';
                        tableData += '<td>'+a.netweight+'</td>';
                        tableData += '<td>'+a.tunch+' %</td>';
                        tableData += '<td>'+a.lobour+' </td>';
                        tableData += '<td>'+a.feiue+' </td>';
                        tableData += '<td>'+formattNumber(a.grandTotal.toFixed(2))+' </td>';
                        tableData += '<td class="text-center">\
                                <div class="btn-group">\
                                    <button type="button" class="btn btn-primary btn-xs">Detail</button>\
                                    <button type="button" class="btn btn-danger btn-xs">Delete</button>\
                                    <button type="button" class="btn btn-primary btn-xs">Update</button>\
                                </div>\
                            </td>';
                        tableData += '</tr>';
                    });
                    $("#items").empty().append(tableData);
                    let paginationTag = '<li class="page-item page-item-pre" page-item-count="pre"><a class="page-link">Previous</a></li>';
                    
                    for(let i = 1; i <= data.dataCount; i++)
                    {
                        if(i == 1){
                            if(((purches.offsetData / purches.maximumRecord) + 1) == i){
                                paginationTag += '<li class="page-item page-item-'+i+' active" page-item-count="'+i+'"><a class="page-link">'+i+'</a></li>';
                            }else{
                                paginationTag += '<li class="page-item page-item-'+i+'" page-item-count="'+i+'"><a class="page-link">'+i+'</a></li>';
                            }                            
                        }else{
                            if(((purches.offsetData / purches.maximumRecord) + 1) == i){
                                paginationTag += '<li class="page-item page-item-'+i+' active" page-item-count="'+i+'"><a class="page-link">'+i+'</a></li>';
                            }else{
                                paginationTag += '<li class="page-item page-item-'+i+'" page-item-count="'+i+'"><a class="page-link">'+i+'</a></li>';
                            }
                            
                        }
                        
                    }
                    paginationTag += '<li class="page-item page-item-next" page-item-count="next"><a class="page-link">Next</a></li>';
                    $("#carate-pagination").empty().append(paginationTag);
                    purches.maxPageoffset = data.dataCount;
                }
            });
        },
    };
    $(document).on("click",".page-item",function(){
        let pageNo = purches.offsetData;
        if($($(this)[0]).attr('page-item-count') != 'pre' || $($(this)[0]).attr('page-item-count') != 'next'){
            pageNo = $($(this)[0]).attr('page-item-count') - 1;
        }
        if(isNaN($($(this)[0]).attr('page-item-count')))
        {
            if($($(this)[0]).attr('page-item-count') == 'pre'){
                if(purches.offsetData != 0 ){
                    purches.offsetData = purches.offsetData - purches.maximumRecord;
                                       
                }
            }else{
                if((purches.offsetData) >= 0 && (purches.offsetData < (purches.maximumRecord * (purches.maxPageoffset - 1)))){
                    purches.offsetData = purches.offsetData + purches.maximumRecord;  
                }
            }
        }else
        {           
            purches.offsetData = pageNo * purches.maximumRecord;
        }
        console.log(purches.offsetData);
        purches.getPurchesList();        
        
    });
    $(document).ready(function(){
        purches.getPurchesList();
    });
})();

function formattNumber(nStr){
    nStr += '';
    var x = nStr.split('.');
    var x1 = x[0];
    var x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
}

