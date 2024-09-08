(()=>{
    let itencarate = {
        maximumRecord:6,
        offsetData:0, 
        maxPageoffset:0,               
        getItemCrate: () => {
            $.ajax({
                url: APP_URL+'/btob/item/fetchCarateItems',
                type: "POST",
                data : {
                    "_token"     : $('#csrf-token')[0].content,
                    "maxData"    :itencarate.maximumRecord,
                    "offsetData" :itencarate.offsetData
                },
                success: function(data){
                    let responceData = data.data, createdDate = '',dateData;
                    let tableData = "";
                    responceData.map((a) => {
                        dateData = new Date(a.created_at); 
                        createdDate = [dateData.getMonth()+1,dateData.getDate(),dateData.getFullYear()].join('/')+' '+[dateData.getHours(),dateData.getMinutes(),dateData.getSeconds()].join(':');
                        tableData += '<tr>';
                        tableData += '<td>'+a.id+'</td>';
                        tableData += '<td>'+a.itemcarat+'</td>';
                        tableData += '<td>'+a.item.itemname+'</td>';
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
                            if(((itencarate.offsetData / itencarate.maximumRecord) + 1) == i){
                                paginationTag += '<li class="page-item page-item-'+i+' active" page-item-count="'+i+'"><a class="page-link">'+i+'</a></li>';
                            }else{
                                paginationTag += '<li class="page-item page-item-'+i+'" page-item-count="'+i+'"><a class="page-link">'+i+'</a></li>';
                            }                            
                        }else{
                            if(((itencarate.offsetData / itencarate.maximumRecord) + 1) == i){
                                paginationTag += '<li class="page-item page-item-'+i+' active" page-item-count="'+i+'"><a class="page-link">'+i+'</a></li>';
                            }else{
                                paginationTag += '<li class="page-item page-item-'+i+'" page-item-count="'+i+'"><a class="page-link">'+i+'</a></li>';
                            }
                            
                        }
                        
                    }
                    paginationTag += '<li class="page-item page-item-next" page-item-count="next"><a class="page-link">Next</a></li>';
                    $("#carate-pagination").empty().append(paginationTag);
                    itencarate.maxPageoffset = data.dataCount;
                }
            });
        },

        getItems: () => {
            $.ajax({
                url: APP_URL+'/btob/item/getItems',
                type: "POST",
                data : {
                    "_token": $('#csrf-token')[0].content,  //pass the CSRF_TOKEN()
                    "maxData"    :1000,
                    "offsetData" :0
                },
                success: function(data){
                    console.log(data);
                    let items = '';
                    data.data.map((a)=>{
                        items += '<option value="'+a.id+'">'+a.itemname+'</option>';
                    });
                    $("#item_id").empty().append(items);
                }
            });
        },
    };
    $(document).on("click",".page-item",function(){
        let pageNo = itencarate.offsetData;
        if($($(this)[0]).attr('page-item-count') != 'pre' || $($(this)[0]).attr('page-item-count') != 'next'){
            pageNo = $($(this)[0]).attr('page-item-count') - 1;
        }
        if(isNaN($($(this)[0]).attr('page-item-count')))
        {
            if($($(this)[0]).attr('page-item-count') == 'pre'){
                if(itencarate.offsetData != 0 ){
                    itencarate.offsetData = itencarate.offsetData - itencarate.maximumRecord;
                                       
                }
            }else{
                if((itencarate.offsetData) >= 0 && (itencarate.offsetData < (itencarate.maximumRecord * (itencarate.maxPageoffset - 1)))){
                    itencarate.offsetData = itencarate.offsetData + itencarate.maximumRecord;  
                }
            }
        }else
        {           
            itencarate.offsetData = pageNo * itencarate.maximumRecord;
        }
        console.log(itencarate.offsetData);
        itencarate.getItemCrate();        
        
    });
    
    $(document).ready(function(){
        itencarate.getItems();
        itencarate.getItemCrate();
    });
    
})();

