$(document).ready(function () {$("#submit-1279303374").bind("click", function (event) {$.ajax({data:$("#submit-1279303374").closest("form").serialize(), dataType:"html", success:function (data, textStatus) {$("#items").html(data);}, type:"post", url:"\/planner\/events\/detail\/mountainhouse2013palooza"});
return false;});});