$(document).ready(function () {$("#submit-11571441").bind("click", function (event) {$.ajax({data:$("#submit-11571441").closest("form").serialize(), dataType:"html", success:function (data, textStatus) {$("#items").html(data);}, type:"post", url:"\/planner\/events\/detail\/party\/items"});
return false;});});