$(document).ready(function () {$("#submit-140411471").bind("click", function (event) {$.ajax({data:$("#submit-140411471").closest("form").serialize(), dataType:"html", success:function (data, textStatus) {$("#items").html(data);}, type:"post", url:"\/planner\/Events\/detail\/tobiasparker"});
return false;});
$("#submit-2017043773").bind("click", function (event) {$.ajax({data:$("#submit-2017043773").closest("form").serialize(), dataType:"html", success:function (data, textStatus) {$("#Fridaymorning").html(data);}, type:"post", url:"\/planner\/Events\/detail\/tobiasparker"});
return false;});
$("#submit-1361013141").bind("click", function (event) {$.ajax({data:$("#submit-1361013141").closest("form").serialize(), dataType:"html", success:function (data, textStatus) {$("#Saturdaymorning").html(data);}, type:"post", url:"\/planner\/Events\/detail\/tobiasparker"});
return false;});
$("#submit-1637628525").bind("click", function (event) {$.ajax({data:$("#submit-1637628525").closest("form").serialize(), dataType:"html", success:function (data, textStatus) {$("#Sundaymorning").html(data);}, type:"post", url:"\/planner\/Events\/detail\/tobiasparker"});
return false;});
$("#submit-493428779").bind("click", function (event) {$.ajax({data:$("#submit-493428779").closest("form").serialize(), dataType:"html", success:function (data, textStatus) {$("#Mondaymorning").html(data);}, type:"post", url:"\/planner\/Events\/detail\/tobiasparker"});
return false;});});