function get_sub(qty,price,res) {
    var num_qty = document.getElementById(qty).value;
    document.getElementById(res).innerHTML = Number(num_qty) * Number(price);
}
function total_item(qty,res,res_sub,top) {
    

    var num_qty = document.getElementsByTagName("input");
    var total=0;
    var sub_total = 0;
    for (i = 0; i < qty; i++) {
        var sub_id = num_qty[i].id + "s";
        total += Number(num_qty[i].value);
        sub_total += Number(document.getElementById(sub_id).innerHTML);
    }
    document.getElementById(res).innerHTML = total;
    
    document.getElementById(res_sub).innerHTML = sub_total;
    var toping = document.getElementById(top).value;
    if (toping != 0){
        sub_top(top,res_sub);
    }
}
function sub_top(id,res){
    document.getElementById(res).innerHTML = 
    Number(document.getElementById(res).innerHTML)+
    Number(document.getElementById(id).value)    
}

function sumItem(){//sum for items
     var ft = Number(document.getElementById("fq").value);
        var pt = Number(document.getElementById("pq").value);
        var ct = Number(document.getElementById("cq").value);
        var bt = Number(document.getElementById("bq").value);
        var rt = Number(document.getElementById("rq").value);
        var sumItem = ft + pt + ct + bt + rt;   
        var tft = Number(document.getElementById("fqs").innerHTML);
        var tpt = Number(document.getElementById("pqs").innerHTML);
        var tct = Number(document.getElementById("cqs").innerHTML);
        var tbt = Number(document.getElementById("bqs").innerHTML);
        var trt = Number(document.getElementById("rqs").innerHTML);
        var top = Number(document.getElementById("topping").value);
        var total = tft + tpt +tct + tbt + trt + top;
        document.getElementById("sumItem").innerHTML = sumItem;
        document.getElementById("total").innerHTML = total;        
    }
    
    /*
    function totalCharge(){//sum for charge
        
        
        document.getElementById("sumCharge").innerHTML = ;
    }
    
    */
  
    