(()=>{
    let itenPage = {
        maximumRecord:6,
        offsetData:0, 
        maxPageoffset:0,
        getItems: () =>{
            $.ajax({
                url: APP_URL+'/btob/item/getItems',
                type: "POST",
                data : {
                    "_token"     : $('#csrf-token')[0].content,
                    "maxData"    :itenPage.maximumRecord,
                    "offsetData" :itenPage.offsetData
                },
                success: function(data){
                    console.log(data);
                    $("#items").empty();
                    let tableData = '',createdDate = '',dateData;
                    data.data.map((a)=>{
                        if (a.created_at !== null)
                        {
                            dateData = new Date(a.created_at); 
                            createdDate = [dateData.getMonth()+1,dateData.getDate(),dateData.getFullYear()].join('/')+' '+[dateData.getHours(),dateData.getMinutes(),dateData.getSeconds()].join(':');
                        }
                        else{
                            createdDate = '-';
                        }
                        
                        tableData += '<tr>';
                        tableData += '<td>'+a.id+'</td>';
                        tableData += '<td>'+a.itemname+'</td>';
                        tableData += '<td>'+createdDate+'</td>';
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
                            if(((itenPage.offsetData / itenPage.maximumRecord) + 1) == i){
                                paginationTag += '<li class="page-item page-item-'+i+' active" page-item-count="'+i+'"><a class="page-link">'+i+'</a></li>';
                            }else{
                                paginationTag += '<li class="page-item page-item-'+i+'" page-item-count="'+i+'"><a class="page-link">'+i+'</a></li>';
                            }                            
                        }else{
                            if(((itenPage.offsetData / itenPage.maximumRecord) + 1) == i){
                                paginationTag += '<li class="page-item page-item-'+i+' active" page-item-count="'+i+'"><a class="page-link">'+i+'</a></li>';
                            }else{
                                paginationTag += '<li class="page-item page-item-'+i+'" page-item-count="'+i+'"><a class="page-link">'+i+'</a></li>';
                            }
                            
                        }
                        
                    }
                    paginationTag += '<li class="page-item page-item-next" page-item-count="next"><a class="page-link">Next</a></li>';
                    $("#carate-pagination").empty().append(paginationTag);
                    itenPage.maxPageoffset = data.dataCount;
                }
            });
        },
    };

    $(document).on("click",".page-item",function(){
        let pageNo = itenPage.offsetData;
        if($($(this)[0]).attr('page-item-count') != 'pre' || $($(this)[0]).attr('page-item-count') != 'next'){
            pageNo = $($(this)[0]).attr('page-item-count') - 1;
        }
        if(isNaN($($(this)[0]).attr('page-item-count')))
        {
            if($($(this)[0]).attr('page-item-count') == 'pre'){
                if(itenPage.offsetData != 0 ){
                    itenPage.offsetData = itenPage.offsetData - itenPage.maximumRecord;
                                       
                }
            }else{
                if((itenPage.offsetData) >= 0 && (itenPage.offsetData < (itenPage.maximumRecord * (itenPage.maxPageoffset - 1)))){
                    itenPage.offsetData = itenPage.offsetData + itenPage.maximumRecord;  
                }
            }
        }else
        {           
            sitenPageelf.offsetData = pageNo * itenPage.maximumRecord;
        }
        console.log(itenPage.offsetData);
        itenPage.getItems();        
        
    });
    $(document).ready(function(){
        itenPage.getItems();
    });
})();