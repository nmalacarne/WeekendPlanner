$(document).ready(function () {$("#submit-1121018874").bind("click", function (event) {$.ajax({data:$("#submit-1121018874").closest("form").serialize(), dataType:"html", success:function (data, textStatus) {$("#items").html(data);}, type:"post", url:"\/planner\/events\/detail\/tobiasparker"});
return false;});});