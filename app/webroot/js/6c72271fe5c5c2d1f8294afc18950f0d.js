$(document).ready(function () {$("#submit-1471175184").bind("click", function (event) {$.ajax({data:$("#submit-1471175184").closest("form").serialize(), dataType:"html", success:function (data, textStatus) {$("#items").html(data);}, type:"post", url:"\/planner\/events\/detail\/tobiasparker"});
return false;});
$("#submit-1769929105").bind("click", function (event) {$.ajax({data:$("#submit-1769929105").closest("form").serialize(), dataType:"html", success:function (data, textStatus) {$("#Day1details").html(data);}, type:"post", url:"\/planner\/events\/detail\/tobiasparker"});
return false;});
$("#submit-1694820495").bind("click", function (event) {$.ajax({data:$("#submit-1694820495").closest("form").serialize(), dataType:"html", success:function (data, textStatus) {$("#Day2details").html(data);}, type:"post", url:"\/planner\/events\/detail\/tobiasparker"});
return false;});
$("#submit-1049879080").bind("click", function (event) {$.ajax({data:$("#submit-1049879080").closest("form").serialize(), dataType:"html", success:function (data, textStatus) {$("#Day3details").html(data);}, type:"post", url:"\/planner\/events\/detail\/tobiasparker"});
return false;});
$("#submit-827473143").bind("click", function (event) {$.ajax({data:$("#submit-827473143").closest("form").serialize(), dataType:"html", success:function (data, textStatus) {$("#Day4details").html(data);}, type:"post", url:"\/planner\/events\/detail\/tobiasparker"});
return false;});});