
mpxd.constructors.page_info_system = function(data) {
    mpxd.modules.general.GenerateGeneralview(data);
}

mpxd.constructors.system_design_1 = function(data) {
    mpxd.modules.general.GenerateGeneralview(data);
}

mpxd.constructors.system_design_2 = function(data) {
    mpxd.modules.general.GenerateGeneralview(data);
}

mpxd.constructors.system_design_3 = function(data) {
    mpxd.modules.general.GenerateGeneralview(data);
}
/*
 mpxd.constructors.sys_system_design_2 = function(data) {
 mpxd.modules.general.GenerateGeneralview(data);
 }

 mpxd.constructors.sys_system_design_3 = function(data) {
 mpxd.modules.general.GenerateGeneralview(data);
 }
 */
mpxd.constructors.testing_commisioning_1 = function(data) {
    mpxd.modules.general.GenerateGeneralview(data);
}

mpxd.constructors.testing_commisioning_2 = function(data) {
    mpxd.modules.general.GenerateGeneralview(data);
}

mpxd.constructors.testing_commisioning_3 = function(data) {
    mpxd.modules.general.GenerateGeneralview(data);
}

mpxd.constructors.testing_commisioning_4 = function(data) {
    mpxd.modules.general.GenerateGeneralview(data);
}

mpxd.constructors.procurement_manufacturing_1 = function(data) {
    mpxd.modules.general.GenerateGeneralview(data);
}

mpxd.constructors.procurement_manufacturing_2 = function(data) {
    mpxd.modules.general.GenerateGeneralview(data);
}

mpxd.constructors.procurement_manufacturing_3 = function(data) {
    mpxd.modules.general.GenerateGeneralview(data);
}

mpxd.constructors.procurement_manufacturing_4 = function(data) {
    mpxd.modules.general.GenerateGeneralview(data);
}

mpxd.constructors.procurement_manufacturing_5 = function(data) {
    mpxd.modules.general.GenerateGeneralview(data);
}

mpxd.constructors.installation_1 = function(data) {
    mpxd.modules.general.GenerateGeneralview(data);
}

mpxd.constructors.installation_2 = function(data) {
    mpxd.modules.general.GenerateGeneralview(data);
}

mpxd.constructors.installation_3 = function(data) {
    mpxd.modules.general.GenerateGeneralview(data);
}

mpxd.constructors.delivery_1 = function(data) {
    mpxd.modules.general.GenerateGeneralview(data);
}
mpxd.constructors.delivery_2 = function(data) {
    mpxd.modules.general.GenerateGeneralview(data);
}
mpxd.constructors.delivery_3 = function(data) {
    mpxd.modules.general.GenerateGeneralview(data);
}
mpxd.constructors.delivery_4 = function(data) {
    mpxd.modules.general.GenerateGeneralview(data);
}
mpxd.constructors.delivery_5 = function(data) {
    mpxd.modules.general.GenerateGeneralview(data);
}
mpxd.constructors.le = function(data) {
    mpxd.modules.general.GenerateGeneralview(data);
}

mpxd.constructors.train_manufacturing_progress_table = function(data) {
    var el = "#portlet_" + data.id;
    return new mpxd.modules.train_manufacturing_progress_table.train_progress({data: data, el: el});
}




mpxd.modules.train_manufacturing_progress_table = {}
mpxd.modules.train_manufacturing_progress_table.train_progress = Backbone.View.extend({
    initialize: function(options) {
        //console.log(options);
        this.data = options.data;
        this.render();
    },
    render: function() {
        var that = this;
        var html = mpxd.getTemplate("train_manufacturing_progress_table");

        template = _.template(html, {data: that.data});

        var cookiename = 'sbk-s-01-mfg-progress';

        that.$el.html(template);
       //that.$el.find('.content').mCustomScrollbar({theme: 'rounded'});
       // that.$el.find('.train-container').mCustomScrollbar({
       //     setHeight:1000,
       //     theme: 'rounded'
       // });
            that.$el.find('.summersoft_scroll').slimScroll({
                color: '#fff',
                height: '700px',
                alwaysVisible: true
            });
        //that.$el.find('.summersoft_container').slimScroll({
        //    color: '#fff',
        //    alwaysVisible: true
        //});

		/*d3.xml("/mpxd/assets/img/mrt_train_diagram_1.svg", "image/svg+xml", function(error, xml) {
		  if (error) throw error;
			that.$el.find('.train-container')[0].appendChild(xml.documentElement);
		});*/
		
		/* Fetch svgs in promises */
		var deferred = new $.Deferred();

		// Dont change the order of the strings, need to sync with later function.
		var promises = $.map(['mrt_train_diagram_1.svg','mrt_train_diagram_2.svg','mrt_train_diagram_3.svg','mrt_train_diagram_4.svg'], 
			function(item, idx) {
				var d = $.Deferred();
				d3.xml("/mpxd/assets/img/" + item, "image/svg+xml", function(error, xml) { if (error) d.reject(error); else d.resolve(xml.documentElement); }); 
				return d.promise();
		});
		
		var findConsecutive = function(arr, index) {
			var c = 0;
			var text = arr[index];
			for (var i = index+1; i < arr.length; i++) {
				if (arr[i] == text) c++;
				else return c;
			}
			return c;
		}

		$.when.apply($, promises).then(function(a) {
			var head = arguments[0];
			var leftmotor = arguments[1];
			var body = arguments[2];
			var rightmotor = arguments[3];
			
			var $manufacturingContainer = that.$el.find('.manufacturing-container');
			var $assemblyContainer = that.$el.find('.assembly-container');
			var $subdContainer = that.$el.find('.subd-container');
			var $kjdContainer = that.$el.find('.kjd-container');
			
			$(head).attr('class', 'train-svg-head');
			$(leftmotor).attr('class', 'train-svg-leftmotor');
			$(body).attr('class', 'train-svg-body');
			$(rightmotor).attr('class', 'train-svg-rightmotor');
            var c_data_date="?date="+moment($("#et_data_date").val(), "DD-MMM-YY").format("YYYY-MM-DD");
			
			//var trainContainer = that.$el.find('.train-container')[0];
			
			var generateTrain = function() {
				return $.map([head,leftmotor,body,body,rightmotor], function(item, idx){ return $.clone(item); })
			}


			var cnum = 1001;
			
			var renderTrainDom = function(data) {
				
				var $table = $('<table style="text-align: center; margin: 30px;">');
				var $thead = $('<thead>');
				var $tbody = $('<tbody>');
				
				$table.append($thead);
				$table.append($tbody);
				
				var generateTooltipDiv = function(html) {
					var $div = $('<div>');
					$div.addClass('hastooltip');
					$div.attr('data-toggle','tooltip');
					$div.attr('data-html','true');
					$div.attr('title',html);
					return $div
				}
				
				
				var generateTooltipContainer = function(d) {
					if ((typeof d != 'undefined') && (typeof d['assembly'] != 'undefined') && (d['assembly'] != '') && (typeof d['manufacturing'] != 'undefined') && (d['manufacturing'] != '')) {
						var ass = d['assembly'];
						var man = d['manufacturing'];
                        var carnum = d['car'];
						var html = 'Manufacturing: ' + man + '<br>Assembly: ' + ass+'<br>Car number: '+ carnum;
						return generateTooltipDiv(html);
					} 
					return $('<div>');
				}
				
				$.each(data, function(idx, i) {
					var train = generateTrain();
					
					
					var hd = train[0];
					var lm = train[1];
					var b1 = train[2];
					var b2 = train[3];
					var rm = train[4];
					
					// First row - delivery row
					var $tr1 = $('<tr>');
					
					
					var $r1td1 = $('<td>');
					
					//var deliveryText = (typeof i['delivery'] != undefined) ? 'Target delivery: '+i['delivery'] : '';
					var toptext = i['toptext'] == '' ? '&nbsp':i['toptext'];
					$tr1.append($r1td1).append($('<td>').attr('colspan','4').html(toptext));
					
					// Second row - train row
					var $tr2 = $('<tr>');
					var $tdhead = $('<td style="width: 80px">');
					$tdhead.append(hd);
					
					d3.select(hd.querySelector('#path4147-2')).attr('fill', i['color']);
					
					var $r2td1 = $('<td>');
					var $r2td2 = $('<td>');
					var $r2td3 = $('<td>');
					var $r2td4 = $('<td>');
					
					
					d3.select(lm.querySelector('#path4836')).attr('fill',i['cars'][0]['color']);
					$r2td1.append(generateTooltipContainer(i['cars'][0]['history']).append(lm));
					
					d3.select(b1.querySelector('#path4836')).attr('fill',i['cars'][1]['color']);
					$r2td2.append(generateTooltipContainer(i['cars'][1]['history']).append(b1));
					
					d3.select(b2.querySelector('#path4836')).attr('fill',i['cars'][2]['color']);
					$r2td3.append(generateTooltipContainer(i['cars'][2]['history']).append(b2));
					
					d3.select(rm.querySelector('#path4836')).attr('fill',i['cars'][3]['color']);
					$r2td4.append(generateTooltipContainer(i['cars'][3]['history']).append(rm));
					
					$tr2.append($tdhead).append($r2td1).append($r2td2).append($r2td3).append($r2td4);
					
					// Third row - train ids
					var $tr3 = $('<tr>');
					var $tdheadid = $('<td>');
					var $r3td1 = $('<td>');
					var $r3td2 = $('<td>');
					var $r3td3 = $('<td>');
					var $r3td4 = $('<td>');
					
					$tdheadid.text(i['name'])
					$r3td1.text(i['cars'][0]['name']);
					$r3td2.text(i['cars'][1]['name']);
					$r3td3.text(i['cars'][2]['name']);
					$r3td4.text(i['cars'][3]['name']);
					
					
					$tr3.append($tdheadid).append($r3td1).append($r3td2).append($r3td3).append($r3td4);
					
					
					// Fourth row - train progress and rollout and dynamic test and arrived on
					var $tr4 = $('<tr>');
					var $tdheadprogress = $('<td>');
					$tdheadprogress.append($('<p>').text(i['progress']));
					$tr4.append($tdheadprogress);
					// Search for consecutive text and combine them if have to
					var texts = $.map(i['cars'], function(v){return v['text']});
					for (var x = 0; x < texts.length; x++) {
						var text = texts[x];
						var $td = $('<td>').text(text);
						
						if (text.indexOf('%') > -1) {
							// Dont consecutive search
							$tr4.append($td);
						} else {
							// Do
							var count = findConsecutive(texts,x);
							if (count > 0) {
								$td.attr('colspan',count+1)
								//$td.css('background-color','#555');
							}
							$tr4.append($td);
							x = x+count;
						}
					}
					
					//$.each([$tr1,$tr2,$tr3,$tr4], function(idx, v){v.css('background-color','#444')});
					$tbody.append($tr1).append($tr2).append($tr3).append($tr4);
					$tbody.append($('<tr>').append($('<td colspan="5" style="height:30px">')));//.append($('<hr>').css('border-color','#444'))))
					
				});
				return $table;
			}
			
			var generateTable = function(data) {
				var $table = $('<table>').addClass('table table-bordered table-condensed table-hover');
				var $thead = $('<thead>');
				var $tbody = $('<tbody>');
				
				var $tr = $('<tr>');
				for (var i = 0; i < data[0].length; i++) {
					var $td = $('<td>');
					$td.html(data[0][i]);
					$tr.append($td);
				}
				$thead.append($tr);
				
				// Start from 1 since the first is for header
				for (var i = 1; i < data.length; i++) {
					var $tr = $('<tr>');
					for (var j = 0; j < data[i].length; j++) {
						var d = data[i][j];
						var $td = $('<td>');
						$td.html(d);
						$tr.append($td);
					}
					$tbody.append($tr);
				}
				
				$table.append($thead);
				$table.append($tbody);
				return $table;
			}

            var generateDataTable = function(data) {
                var $table = $('<table>').addClass('table table-bordered table-condensed table-hover summersoft_container');
                var $thead = $('<thead>');
                var $tbody = $('<tbody>');

                var $tr = $('<tr>');
                for (var i = 0; i < data[0].length; i++) {
                    var $td = $('<th style="color: #ffd461;text-align: center;">');
                    $td.html(data[0][i]);
                    $tr.append($td);
                }
                $thead.append($tr);

                // Start from 1 since the first is for header
                for (var i = 1; i < data.length; i++) {
                    var $tr = $('<tr class="s_comments">');
                    for (var j = 0; j < (data[i].length)-1; j++) {
                        var d = data[i][j+1];
                        var $td = $('<td>');
                        var $span=$('<span>');
                        $span.html(d);
                        $td.append($span);
                        if(((j+1)%2)==0) {
                            $td.append('<a data-value="'+data[i][j-1]+'" class="s_delete" href="javascript:void(0);"><i style="padding-left: 10px;color: #ffd461;" class="fa fa-trash-o pull-right">');
                        }
                        $tr.append($td);
                    }
                    $tbody.append($tr);
                }

                $table.append($thead);
                $table.append($tbody);
                return $table;
            }

            //var trainData = {	"manufacturing":{"Train 28":{"delivery":"07-Jan-16","cars":{"M1055":{"progress":"100%","rollout":"12-Dec-15","arrived":"","history":{"manufacturing":"Train 26","assembly":"Train 27"}},"T2055":{"progress":"100%","rollout":"12-Dec-15","arrived":"","history":{"manufacturing":"","assembly":""}},"T2056":{"progress":"100%","rollout":"12-Dec-15","arrived":"","history":{"manufacturing":"","assembly":""}},"M1056":{"progress":"90%","rollout":"","arrived":"","history":{"manufacturing":"","assembly":""}}}},"Train 29":{"delivery":"","cars":{"M1057":{"progress":"100%","rollout":"12-Dec-15","arrived":"","history":{"manufacturing":"","assembly":""}},"T2057":{"progress":"90%","rollout":"","arrived":"","history":{"manufacturing":"","assembly":""}},"T2058":{"progress":"75%","rollout":"","arrived":"","history":{"manufacturing":"","assembly":""}},"M1058":{"progress":"90%","rollout":"","arrived":"","history":{"manufacturing":"","assembly":""}}}},"Train 30":{"delivery":"","cars":{"M1059":{"progress":"60%","rollout":"","arrived":"","history":{"manufacturing":"","assembly":""}},"T2059":{"progress":"60%","rollout":"","arrived":"","history":{"manufacturing":"","assembly":""}},"T2060":{"progress":"60%","rollout":"","arrived":"","history":{"manufacturing":"","assembly":""}},"M1060":{"progress":"30%","rollout":"","arrived":"","history":{"manufacturing":"","assembly":""}}}},"Train 31":{"delivery":"","cars":{"M1061":{"progress":"30%","rollout":"","arrived":"","history":{"manufacturing":"","assembly":""}},"T2061":{"progress":"30%","rollout":"","arrived":"","history":{"manufacturing":"","assembly":""}},"T2062":{"progress":"30%","rollout":"","arrived":"","history":{"manufacturing":"","assembly":""}},"M1062":{"progress":"30%","rollout":"","arrived":"","history":{"manufacturing":"","assembly":""}}}},"Train 32":{"delivery":"","cars":{"M1063":{"progress":"10%","rollout":"","arrived":"","history":{"manufacturing":"","assembly":""}},"T2063":{"progress":"30%","rollout":"","arrived":"","history":{"manufacturing":"","assembly":""}},"T2064":{"progress":"15%","rollout":"","arrived":"","history":{"manufacturing":"","assembly":""}},"M1064":{"progress":"10%","rollout":"","arrived":"","history":{"manufacturing":"","assembly":""}}}}},
            //    "assembly":{"Train 25":{"delivery":"07-Jan-16","cars":{"M1052":{"progress":"46%","rollout":"","arrived":"","history":{"manufacturing":"Train 26","assembly":"Train 27"}},"T2050":{"progress":"66%","rollout":"","arrived":"","history":{"manufacturing":"","assembly":""}},"T2051":{"progress":"40%","rollout":"","arrived":"","history":{"manufacturing":"","assembly":""}},"M1046":{"progress":"31%","rollout":"","arrived":"","history":{"manufacturing":"","assembly":""}}}},"Train 26":{"delivery":"16-Jan-16","cars":{"M1051":{"progress":"100%","rollout":"","arrived":"21-Dec-15","history":{"manufacturing":"","assembly":""}},"T2035":{"progress":"5%","rollout":"","arrived":"","history":{"manufacturing":"","assembly":""}},"T2052":{"progress":"","rollout":"","arrived":"","history":{"manufacturing":"","assembly":""}},"M1037":{"progress":"5%","rollout":"","arrived":"","history":{"manufacturing":"","assembly":""}}}},"Train 27":{"delivery":"26-Jan-16","cars":{"M1053":{"progress":"100%","rollout":"","arrived":"21-Dec-15","history":{"manufacturing":"","assembly":""}},"T2053":{"progress":"","rollout":"","arrived":"","history":{"manufacturing":"","assembly":""}},"T2054":{"progress":"100%","rollout":"","arrived":"12-Dec-15","history":{"manufacturing":"","assembly":""}},"M1054":{"progress":"100%","rollout":"","arrived":"12-Dec-15","history":{"manufacturing":"","assembly":""}}}}},
            //    "subd":{"Train 1 - 24":{"delivery":"","testingcompleted":"Train 1 - 24 delivered to to SUBD as per agreed SSSC target programme - by 23/12/15, and have completed dynamic test","cars":{"1131":{"progress":"","rollout":"","arrived":"","history":{"manufacturing":"Train 4","assembly":"Train 12"}},"1132":{"progress":"","rollout":"","arrived":"","history":{"manufacturing":"Train 11","assembly":"Train 9"}},"1133":{"progress":"","rollout":"","arrived":"","history":{"manufacturing":"Train 5","assembly":"Train 11"}},"1134":{"progress":"","rollout":"","arrived":"","history":{"manufacturing":"Train 10","assembly":"Train 9"}}}},"Train 13":{"delivery":"","cars":{"1131":{"progress":"","rollout":"","arrived":"","history":{"manufacturing":"Train 4","assembly":"Train 12"}},"1132":{"progress":"","rollout":"","arrived":"","history":{"manufacturing":"Train 11","assembly":"Train 9"}},"1133":{"progress":"","rollout":"","arrived":"","history":{"manufacturing":"Train 5","assembly":"Train 11"}},"1134":{"progress":"","rollout":"","arrived":"","history":{"manufacturing":"Train 10","assembly":"Train 9"}}}},"Train 14":{"delivery":"","cars":{"1141":{"progress":"","rollout":"","arrived":"","history":{"manufacturing":"Train 4","assembly":"Train 12"}},"1142":{"progress":"","rollout":"","arrived":"","history":{"manufacturing":"Train 11","assembly":"Train 9"}},"1143":{"progress":"","rollout":"","arrived":"","history":{"manufacturing":"Train 5","assembly":"Train 11"}},"1144":{"progress":"","rollout":"","arrived":"","history":{"manufacturing":"Train 10","assembly":"Train 9"}}}},"Train 15":{"delivery":"","cars":{"1151":{"progress":"","rollout":"","arrived":"","history":{"manufacturing":"Train 4","assembly":"Train 12"}},"1152":{"progress":"","rollout":"","arrived":"","history":{"manufacturing":"Train 11","assembly":"Train 9"}},"1153":{"progress":"","rollout":"","arrived":"","history":{"manufacturing":"Train 5","assembly":"Train 11"}},"1154":{"progress":"","rollout":"","arrived":"","history":{"manufacturing":"Train 10","assembly":"Train 9"}}}},"Train 16":{"delivery":"","cars":{"1161":{"progress":"","rollout":"","arrived":"","history":{"manufacturing":"Train 4","assembly":"Train 12"}},"1162":{"progress":"","rollout":"","arrived":"","history":{"manufacturing":"Train 11","assembly":"Train 9"}},"1163":{"progress":"","rollout":"","arrived":"","history":{"manufacturing":"Train 5","assembly":"Train 11"}},"1164":{"progress":"","rollout":"","arrived":"","history":{"manufacturing":"Train 10","assembly":"Train 9"}}}},"Train 17":{"delivery":"","cars":{"1171":{"progress":"","rollout":"","arrived":"","history":{"manufacturing":"Train 4","assembly":"Train 12"}},"1172":{"progress":"","rollout":"","arrived":"","history":{"manufacturing":"Train 11","assembly":"Train 9"}},"1173":{"progress":"","rollout":"","arrived":"","history":{"manufacturing":"Train 5","assembly":"Train 11"}},"1174":{"progress":"","rollout":"","arrived":"","history":{"manufacturing":"Train 10","assembly":"Train 9"}}}},"Train 18":{"delivery":"","cars":{"1181":{"progress":"","rollout":"","arrived":"","history":{"manufacturing":"Train 4","assembly":"Train 12"}},"1182":{"progress":"","rollout":"","arrived":"","history":{"manufacturing":"Train 11","assembly":"Train 9"}},"1183":{"progress":"","rollout":"","arrived":"","history":{"manufacturing":"Train 5","assembly":"Train 11"}},"1184":{"progress":"","rollout":"","arrived":"","history":{"manufacturing":"Train 10","assembly":"Train 9"}}}},"Train 19":{"delivery":"","cars":{"1191":{"progress":"","rollout":"","arrived":"","history":{"manufacturing":"Train 4","assembly":"Train 12"}},"1192":{"progress":"","rollout":"","arrived":"","history":{"manufacturing":"Train 11","assembly":"Train 9"}},"1193":{"progress":"","rollout":"","arrived":"","history":{"manufacturing":"Train 5","assembly":"Train 11"}},"1194":{"progress":"","rollout":"","arrived":"","history":{"manufacturing":"Train 10","assembly":"Train 9"}}}},"Train 20":{"delivery":"","cars":{"1201":{"progress":"","rollout":"","arrived":"","history":{"manufacturing":"Train 4","assembly":"Train 12"}},"1202":{"progress":"","rollout":"","arrived":"","history":{"manufacturing":"Train 11","assembly":"Train 9"}},"1203":{"progress":"","rollout":"","arrived":"","history":{"manufacturing":"Train 5","assembly":"Train 11"}},"1204":{"progress":"","rollout":"","arrived":"","history":{"manufacturing":"Train 10","assembly":"Train 9"}}}},"Train 21":{"delivery":"","cars":{"1211":{"progress":"","rollout":"","arrived":"","history":{"manufacturing":"Train 4","assembly":"Train 12"}},"1212":{"progress":"","rollout":"","arrived":"","history":{"manufacturing":"Train 11","assembly":"Train 9"}},"1213":{"progress":"","rollout":"","arrived":"","history":{"manufacturing":"Train 5","assembly":"Train 11"}},"1214":{"progress":"","rollout":"","arrived":"","history":{"manufacturing":"Train 10","assembly":"Train 9"}}}},"Train 22":{"delivery":"09-Dec-15","cars":{"1221":{"progress":"","rollout":"","arrived":"","history":{"manufacturing":"Train 4","assembly":"Train 12"}},"1222":{"progress":"","rollout":"","arrived":"","history":{"manufacturing":"Train 11","assembly":"Train 9"}},"1223":{"progress":"","rollout":"","arrived":"","history":{"manufacturing":"Train 5","assembly":"Train 11"}},"1224":{"progress":"","rollout":"","arrived":"","history":{"manufacturing":"Train 10","assembly":"Train 9"}}}},"Train 23":{"delivery":"19-Dec-15","cars":{"1231":{"progress":"","rollout":"","arrived":"","history":{"manufacturing":"Train 4","assembly":"Train 12"}},"1232":{"progress":"","rollout":"","arrived":"","history":{"manufacturing":"Train 11","assembly":"Train 9"}},"1233":{"progress":"","rollout":"","arrived":"","history":{"manufacturing":"Train 5","assembly":"Train 11"}},"1234":{"progress":"","rollout":"","arrived":"","history":{"manufacturing":"Train 10","assembly":"Train 9"}}}},"Train 24":{"delivery":"23-Dec-15","cars":{"1241":{"progress":"","rollout":"","arrived":"","history":{"manufacturing":"Train 4","assembly":"Train 12"}},"1242":{"progress":"","rollout":"","arrived":"","history":{"manufacturing":"Train 11","assembly":"Train 9"}},"1243":{"progress":"","rollout":"","arrived":"","history":{"manufacturing":"Train 5","assembly":"Train 11"}},"1244":{"progress":"","rollout":"","arrived":"","history":{"manufacturing":"Train 10","assembly":"Train 9"}}}}},
            //    "kjd":{"Train 13":{"delivery":"","cars":{"1131":{"progress":"","rollout":"","arrived":"","history":{"manufacturing":"Train 4","assembly":"Train 12"}},"1132":{"progress":"","rollout":"","arrived":"","history":{"manufacturing":"Train 11","assembly":"Train 9"}},"1133":{"progress":"","rollout":"","arrived":"","history":{"manufacturing":"Train 5","assembly":"Train 11"}},"1134":{"progress":"","rollout":"","arrived":"","history":{"manufacturing":"Train 10","assembly":"Train 9"}}}},"Train 14":{"delivery":"","cars":{"1141":{"progress":"","rollout":"","arrived":"","history":{"manufacturing":"Train 4","assembly":"Train 12"}},"1142":{"progress":"","rollout":"","arrived":"","history":{"manufacturing":"Train 11","assembly":"Train 9"}},"1143":{"progress":"","rollout":"","arrived":"","history":{"manufacturing":"Train 5","assembly":"Train 11"}},"1144":{"progress":"","rollout":"","arrived":"","history":{"manufacturing":"Train 10","assembly":"Train 9"}}}},"Train 15":{"delivery":"","cars":{"1151":{"progress":"","rollout":"","arrived":"","history":{"manufacturing":"Train 4","assembly":"Train 12"}},"1152":{"progress":"","rollout":"","arrived":"","history":{"manufacturing":"Train 11","assembly":"Train 9"}},"1153":{"progress":"","rollout":"","arrived":"","history":{"manufacturing":"Train 5","assembly":"Train 11"}},"1154":{"progress":"","rollout":"","arrived":"","history":{"manufacturing":"Train 10","assembly":"Train 9"}}}},"Train 16":{"delivery":"","cars":{"1161":{"progress":"","rollout":"","arrived":"","history":{"manufacturing":"Train 4","assembly":"Train 12"}},"1162":{"progress":"","rollout":"","arrived":"","history":{"manufacturing":"Train 11","assembly":"Train 9"}},"1163":{"progress":"","rollout":"","arrived":"","history":{"manufacturing":"Train 5","assembly":"Train 11"}},"1164":{"progress":"","rollout":"","arrived":"","history":{"manufacturing":"Train 10","assembly":"Train 9"}}}},"Train 17":{"delivery":"","cars":{"1171":{"progress":"","rollout":"","arrived":"","history":{"manufacturing":"Train 4","assembly":"Train 12"}},"1172":{"progress":"","rollout":"","arrived":"","history":{"manufacturing":"Train 11","assembly":"Train 9"}},"1173":{"progress":"","rollout":"","arrived":"","history":{"manufacturing":"Train 5","assembly":"Train 11"}},"1174":{"progress":"","rollout":"","arrived":"","history":{"manufacturing":"Train 10","assembly":"Train 9"}}}},"Train 18":{"delivery":"","cars":{"1181":{"progress":"","rollout":"","arrived":"","history":{"manufacturing":"Train 4","assembly":"Train 12"}},"1182":{"progress":"","rollout":"","arrived":"","history":{"manufacturing":"Train 11","assembly":"Train 9"}},"1183":{"progress":"","rollout":"","arrived":"","history":{"manufacturing":"Train 5","assembly":"Train 11"}},"1184":{"progress":"","rollout":"","arrived":"","history":{"manufacturing":"Train 10","assembly":"Train 9"}}}}}
            //};

            var getSummary = function(d) {
                var trains = Object.keys(d);
                var trainIndeces = _.map(trains, function(t){return parseInt(t.substr(t.indexOf("Train")+6)); })
                // Sort ascending
                trainIndeces.sort(function(a,b){return a-b});
                if(trainIndeces[0] == undefined && trainIndeces[trainIndeces.length-1] == undefined)
                {
                    return "No Train(s) here " ;
                }
                else {
                    if(trainIndeces.length > 1 ) {
                        return "Train " + trainIndeces[0] + " - " + trainIndeces[trainIndeces.length - 1];
                    }
                    else{
                        return "Train " + trainIndeces[0];
                    }
                }
            }

            var getNumberOfTrains = function(d) {
                var trains = Object.keys(d);
                var trainIndeces = _.map(trains, function(t){return parseInt(t.substr(t.indexOf("Train")+6)); })
                // Sort ascending
                trainIndeces.sort(function(a,b){return a-b});
                return parseInt(trainIndeces[trainIndeces.length-1]) - parseInt(trainIndeces[0]) + 1;
            }
            //var mfgsummary = getSummary(trainData['manufacturing']);
            //var asssummary = getSummary(trainData['assembly']);
            //var subdsummary = getSummary(trainData['subd']);
            //var kjdsummary = getSummary(trainData['kjd']);
            //
            //var subdnumber = getNumberOfTrains(trainData['subd']);
            //var kjdnumber = (isNaN(getNumberOfTrains(trainData['kjd'])))?0:getNumberOfTrains(trainData['kjd']);
            //Added by Sebin for Dynamic data Loading
            var trainData={};
                mpxd.getJSONData("gettrainData"+c_data_date+"", function (result) {
                    trainData = (JSON.parse(JSON.stringify(result)));
                    var mfgsummary = getSummary(trainData['manufacturing']);
                    var asssummary = getSummary(trainData['assembly']);
                    var subdsummary = getSummary(trainData['subd']);
                    var kjdsummary = getSummary(trainData['kjd']);

                    var subdnumber = (isNaN(getNumberOfTrains(trainData['subd']))) ? 0 : getNumberOfTrains(trainData['subd']);
                    var kjdnumber = (isNaN(getNumberOfTrains(trainData['kjd']))) ? 0 : getNumberOfTrains(trainData['kjd']);

                    $('#manufacturing_progress_value').text(mfgsummary);
                    $('#assembly_progress_value').text(asssummary);
                    $('#subd_progress_value').text(subdsummary);
                    $('#kjd_progress_value').text(kjdsummary);

                    $('#subd_number_of_trains').text('Total: ' + subdnumber);
                    $('#kjd_number_of_trains').text('Total: ' + kjdnumber);
                });
            var renderManufacturing = function(data) {
                var newdata = [];
                $.each(data, function(idx, i) {
                    var totalCarsProgress = _.reduce($.map(i['cars'], function(v, j) {
                        return parseFloat(v['progress']);
                    }), function(m,v){return m+v});
                    var trainProgress = parseFloat(totalCarsProgress / Object.keys(i['cars']).length).toFixed(0);
                    var color = (trainProgress < 100) ? '#fe0' : '#0f9'
                    newdata.push({
                        'name': idx,
                        'toptext': '',
                        'progress': trainProgress+'%',
                        'color': color,
                        'cars': $.map(i['cars'], function(val, jdx) {
                            var carprogress = parseFloat(val['progress']).toFixed(0);
                            var carcolor = (carprogress < 100) ? '#fe0' : '#0f9'
                            var text = ((typeof val['rollout'] != 'undefined') && (val['rollout'] != '')) ? 'Rolled out on ' + val['rollout'] : carprogress+'%';
                            return {
                                'name': jdx,
                                'text': text,
                                'color': carcolor
                            };
                        })
                    });
                });
                $manufacturingContainer.find('.train-container').html('').append(renderTrainDom(newdata));
                /*var $table = generateTable([
                 ["Train Num.", "Target Roll-out", "Dates acc. to Baseline Rev.06","Current CRRC Forecast Date", "Status"],
                 ["37","04/12/16", "12/04/16","18/04/16", "<div style='width:100%; height: 10px; background:red; display: inline-block'></div>"],
                 ["38","11/12/15", "18/04/16","21/04/16", "<div style='width:100%; height: 10px; background:red; display: inline-block'></div>"],
                 ["39","18/12/15", "25/04/16","27/04/16", "<div style='width:100%; height: 10px; background:red; display: inline-block'></div>"],
                 ["40","25/12/15", "29/04/16","06/05/16", "<div style='width:100%; height: 10px; background:grey; display: inline-block'></div>"],
                 ["41","02/01/15", "06/05/16","-", "<div style='width:100%; height: 10px; background:grey; display: inline-block'></div>"],
                 ["42","08/01/15", "12/05/16","-", "<div style='width:100%; height: 10px; background:grey; display: inline-block'></div>"]
                 ]);*/
                mpxd.getJSONData("manuBaseline"+c_data_date+"", function(result){
                    if(result.length>0) {
                        var $bar;
                        var $rev;
                        var $fordate;
                        var baseline = [];
                        $.each(result, function (idx, i) {
                            $rev =  i['REV_INT'];
                            return;
                        });
                        baseline.push(["Train Num.","Dates acc.to Baseline Rev."+$rev+"","Current CRRC Forecast Date","Status"])
                        $.each(result, function (idx, i) {
                            if(i['STATUS']=='1.00'){
                                $bar="<div style='width:100%; height: 10px; background:#fe0; display: inline-block'></div>";
                            }else if(i['STATUS']=='2.00') {
                                $bar = "<div style='width:100%; height: 10px; background:#f0c; display: inline-block'></div>";
                            }else if(i['STATUS']=='3.00') {
                                $bar = "<div style='width:100%; height: 10px; background:#0f9; display: inline-block'></div>";
                            }else  {
                                $bar = "<div style='width:100%; height: 10px; background:#f06; display: inline-block'></div>";
                            }
                            baseline.push([i['TRAIN_NO'],(i['BASE_DATE']==null)?"-":i['BASE_DATE'],(i['FORE_DATE']==null)?"-":i['FORE_DATE'],$bar]);
                        });
                        var baselines = generateTable(baseline);
                        $manufacturingContainer.find('.table-container').html('').append(baselines);
                    }
                });
            }

            var renderAssembly = function(data) {
                var newdata = [];
                $.each(data, function(idx, i) {
                    var totalCarsProgress = _.reduce($.map(i['cars'], function(v, j) {
                        if (isNaN(parseFloat(v['progress']))) return 0;
                        return parseFloat(v['progress']);
                    }), function(m,v){return m+v});
                    var trainProgress = parseFloat(totalCarsProgress / Object.keys(i['cars']).length).toFixed(0);
                    var color = (trainProgress < 100) ? '#fe0' : '#0f9'
                    newdata.push({
                        'name': idx,
                        'toptext': 'Target delivery: '+ i['delivery'],
                        'progress': trainProgress+'%',
                        'color': color,
                        'cars': $.map(i['cars'], function(val, jdx) {
                            var carprogress = parseFloat(val['progress']).toFixed(0);
                            var carcolor = (carprogress < 100) ? '#fe0' : '#0f9';
                            if (isNaN(carprogress)) carcolor = '#fe0';
                            var text = "Stabling";
                            if ((typeof val['arrived'] != 'undefined') && (val['arrived'] != '')) {
                                text = 'Arrived on ' + val['arrived'];
                            } else if (val['progress'] != '') {
                                text = carprogress+'%';
                            }
                            return {
                                'name': jdx,
                                'text': text,
                                'color': carcolor
                            };
                        })
                    });
                });
                $assemblyContainer.find('.train-container').html('').append(renderTrainDom(newdata));
                //var $table = generateTable([
                //	["Train Num.", "Target Delivery", "Status"],
                //	["24", "22/12/15", "<div style='width:100%; height: 10px; background:grey; display: inline-block'></div>"],
                //	["25", "07/01/15", "<div style='width:100%; height: 10px; background:grey; display: inline-block'></div>"],
                //	["26", "16/01/15", "<div style='width:100%; height: 10px; background:grey; display: inline-block'></div>"],
                //	["27", "26/01/15", "<div style='width:100%; height: 10px; background:grey; display: inline-block'></div>"],
                //	["28", "04/02/16", "<div style='width:100%; height: 10px; background:grey; display: inline-block'></div>"],
                //	["29", "19/02/15", "<div style='width:100%; height: 10px; background:grey; display: inline-block'></div>"],
                //	["30", "29/02/15", "<div style='width:100%; height: 10px; background:grey; display: inline-block'></div>"],
                //	["31", "09/03/15", "<div style='width:100%; height: 10px; background:grey; display: inline-block'></div>"]
                //]);

                /*var $table = generateTable([
                 ["Train Num.", "Dates acc. to Baseline Rev. 06","Current Forecast Roll Out", "Status"],
                 ["33", "14/04/16","23/04/16", "<div style='width:100%; height: 10px; background:grey; display: inline-block'></div>"],
                 ["34", "23/04/16","03/05/16", "<div style='width:100%; height: 10px; background:grey; display: inline-block'></div>"],
                 ["35", "07/06/16","-", "<div style='width:100%; height: 10px; background:grey; display: inline-block'></div>"],
                 ["36", "16/06/16","-", "<div style='width:100%; height: 10px; background:grey; display: inline-block'></div>"],
                 ["37", "27/06/16","-", "<div style='width:100%; height: 10px; background:grey; display: inline-block'></div>"],
                 ["38", "11/07/16","-", "<div style='width:100%; height: 10px; background:grey; display: inline-block'></div>"]
                 ]);*/
                mpxd.getJSONData("AssemblyBaseline"+c_data_date+"", function(result){
                    if(result.length>0) {
                        var $bar;
                        var $rev;
                        var $fordate;
                        var assembly = [];
                        $.each(result, function (idx, i) {
                            $rev =  i['REV_INT'];
                            return;
                        });
                        assembly.push(["Train Num.","Dates acc.to Baseline Rev."+$rev+"","Current Forecast Roll-out","Status"])
                        $.each(result, function (idx, i) {
                            if(i['STATUS']=='1.00'){
                                $bar="<div style='width:100%; height: 10px; background:#fe0; display: inline-block'></div>";
                            }else if(i['STATUS']=='2.00') {
                                $bar = "<div style='width:100%; height: 10px; background:#f0c; display: inline-block'></div>";
                            }else if(i['STATUS']=='3.00') {
                                $bar = "<div style='width:100%; height: 10px; background:#0f9; display: inline-block'></div>";
                            }else  {
                                $bar = "<div style='width:100%; height: 10px; background:#f06; display: inline-block'></div>";
                            }
                            assembly.push([i['TRAIN_NO'],(i['BASE_DATE']==null)?"-":i['BASE_DATE'],(i['FORE_DATE']==null)?"-":i['FORE_DATE'],$bar]);
                        });
                        var assemblys = generateTable(assembly);
                        $assemblyContainer.find('.table-container').html('').append(assemblys);
                    }
                });

                //Modified By Sebin (Dynamic Data)
                //For Comments
                mpxd.getJSONData("fetchComment", function(result){
                    if(result.length>0) {
                        var comments = [];
                        comments.push(["Train Num.", "Comments"]);
                        $.each(result, function (idx, i) {
                            comments.push([i['id'],i['train_no'], i['comments']]);
                        });
                        var $comment = generateDataTable(comments);
                        //$comment.attr("id","dataTab");
                        //console.log("DataTable");
                        $assemblyContainer.find('.comment-container').html('').append($comment);
                        //$('#dataTab').tablePaginate({navigateType:'navigator',recordPerPage:10});
                        //$("#dataTab").DataTable({
                        //    pagingType: "simple",
                        //    language: {
                        //        paginate: {'next': 'Next &rarr;', 'previous': '&larr; Prev'}
                        //    },
                        //    bFilter: false
                        //    //pageLength: 5
                        //    //bSort:false
                        //});
                        //$('#dataTab').removeAttr('style');
                        //$("#dataTab_length").css("display","none");
                    }
                });
            }

            var renderTesting = function(data) {
                var newdata = [];
                $.each(data, function(idx, i) {
                    var color = '#f0c';

                    if ((typeof i['testingcompleted'] != 'undefined') && (i['testingcompleted'] != '')) {
                        newdata.push({
                            'name': idx,
                            'toptext': '',
                            'progress': '',
                            'color': '#ccc',
                            'cars': $.map(i['cars'], function(val, jdx) {
                                var text = i['testingcompleted'];
                                return {
                                    'name': '',
                                    'text': text,
                                    'color': '#ccc'
                                };
                            })
                        });
                    } else {
                        newdata.push({
                            'name': idx,
                            'toptext': '',
                            'progress': '',
                            'color': color,
                            'cars': $.map(i['cars'], function(val, jdx) {
                                var text = 'Dynamic Test Completed';
                                if ((typeof i['delivery'] != 'undefined') && (i['delivery'] != '')) {
                                    text = 'Delivered on ' + i['delivery']
                                }
                                return {
                                    'name': jdx,
                                    'text': text,
                                    'color': color,
                                    'history': val['history']
                                };
                            })
                        });
                    }
                });
                $subdContainer.find('.train-container').html('').append(renderTrainDom(newdata));


                $subdContainer.find('.table-container').html('');
            }

            var renderKJD = function(data) {
                var newdata = [];
                $.each(data, function(idx, i) {
                    var color = '#f0c';
                    newdata.push({
                        'name': idx,
                        'toptext': '',
                        'progress': '',
                        'color': color,
                        'cars': $.map(i['cars'], function(val, jdx) {
                            var text = "Dynamic Test Completed";
                            if ((typeof i['delivery'] != 'undefined') && (i['delivery'] != '')) {
                                text = 'Delivered on ' + i['delivery']
                            }
                            return {
                                'name': jdx,
                                'text': text,
                                'color': color,
                                'history': val['history']
                            };
                        })
                    });
                });
                $kjdContainer.find('.train-container').html('').append(renderTrainDom(newdata));
                $kjdContainer.find('.table-container').html('');
            }

            //renderManufacturing(trainData['manufacturing']);
            //renderAssembly(trainData['assembly']);
            //renderTesting(trainData['subd']);
            //renderKJD(trainData['kjd']);
            //Modified By Sebin For Dynamic data loading

            mpxd.getJSONData("gettrainData"+c_data_date+"", function (result) {
                trainData = (JSON.parse(JSON.stringify(result)));
                renderManufacturing(trainData['manufacturing']);
                renderAssembly(trainData['assembly']);
                renderTesting(trainData['subd']);
                renderKJD(trainData['kjd']);
            });

            that.$el.find('#modal_default_3').on('shown.bs.modal', function() {
                that.$el.find('.modal-body').css('max-height', $(window).height()-237);
            })


            that.$el.tooltip({
                selector: '.hastooltip'
            });


            var panzoomOptions = {
                minScale: 1,
                increment: 0.25,
                startTransform: 'scale(1.0)'
            };

            var currentZoom = 2;
            var setZoom = function(i) {
                var $parent = $panzoom.parent();
                var $zoomin = that.$el.find('.zoom-in');
                var $zoomout = that.$el.find('.zoom-out');
                switch(i) {
                    case 0:
                        $panzoom.panzoom('zoom', 1);
                        $parent.addClass('zoomout');
                        $parent.css('zoom',0.5).css('min-width','2000px');
                        $zoomin.removeAttr('disabled');
                        $zoomout.attr('disabled','disabled');
                        currentZoom = 0;
                        break;
                    case 1:
                        $panzoom.panzoom('zoom', 1);
                        $parent.addClass('zoomout');
                        $parent.css('zoom',0.75).css('min-width','3000px');
                        $zoomin.removeAttr('disabled');
                        $zoomout.removeAttr('disabled');
                        currentZoom = 1;
                        break;
                    case 2:
                        $panzoom.panzoom('zoom', 1);
                        $parent.removeClass('zoomout');
                        $parent.css('zoom',1);
                        $zoomin.removeAttr('disabled');
                        $zoomout.removeAttr('disabled');
                        currentZoom = 2;
                        break;
                    case 3:
                        $panzoom.panzoom('zoom', 1);
                        $parent.removeClass('zoomout');
                        $parent.css('zoom',1.25);
                        $zoomin.removeAttr('disabled');
                        $zoomout.removeAttr('disabled');
                        currentZoom = 3;
                        break;
                    case 4:
                        $panzoom.panzoom('zoom', 1);
                        $parent.removeClass('zoomout');
                        $parent.css('zoom',1.5);
                        $zoomin.attr('disabled','disabled');
                        $zoomout.removeAttr('disabled');
                        currentZoom = 4;
                        break;
                }
                Cookies.set(cookiename, {zoom:currentZoom});
            }

            var setPan = function(zoom, index) {
                var x = 0;
                var y = 0;
                switch(zoom) {
                    case 0:
                        x = 1100;
                        break;
                    case 1:
                        x = 600;
                        break;
                    case 2:
                        x = 375;
                        break;
                    case 3:
                        x = 215;
                        break;
                    case 4:
                        x = 125;
                        break;
                    default:
                        x = 125;
                        break;
                }
                $panzoom.panzoom('pan',x-(index*750),y);
            }

            var $section = that.$el.find('#modal_default_3');
            $panzoom = $section.find('.panzoom').panzoom(panzoomOptions);


            that.$el.find('.manufacturing-link').on('click', function(){
                setPan(currentZoom, 0);
            });

            that.$el.find('.assembly-link').on('click', function(){
                setPan(currentZoom, 1);
            });

            that.$el.find('.testing-link').on('click', function(){
                setPan(currentZoom, 2);
            });

            that.$el.find('.kjd-link').on('click', function(){
                setPan(currentZoom, 3);
            });

            $section.find('.zoom-in').on('click', function() {
                setZoom(currentZoom+1);
            });

            $section.find('.zoom-out').on('click', function() {
                setZoom(currentZoom-1);
            });

            var cookies = Cookies.getJSON(cookiename);
            if ((typeof cookies != 'undefined') && (typeof cookies.zoom != 'undefined')) {
                setZoom(cookies.zoom);
            }

            /* $panzoom.parent().on('mousewheel.focal', function( e ) {
             e.preventDefault();
             var delta = e.delta || e.originalEvent.wheelDelta;
             var zoomOut = delta ? delta < 0 : e.originalEvent.deltaY > 0;
             $panzoom.panzoom('zoom', zoomOut, {
             increment: 0.1,
             animate: false,
             minScale: 1,
             focal: e
             });
             });*/

            //that.$el.find('.train-container')[0].appendChild(generateDom(2));
            //that.$el.find('.train-container')[0].appendChild(generateDom(3));
            /*that.$el.find('.train-container')[0].appendChild(leftmotor);
             that.$el.find('.train-container')[0].appendChild(body);
             that.$el.find('.train-container')[0].appendChild($.clone(body));
             that.$el.find('.train-container')[0].appendChild(rightmotor);*/

            //console.log('fetch is done',a,arguments);
            deferred.resolve();
        });


    }
});


mpxd.constructors.train_progress = function(data) {
    //alert(data.data.currentActual);
    if (typeof data.data.id == "undefined")
        data.data.id = data.id;
    if (typeof data.data.title == "undefined")
        data.data.title = data.title;
    /*var s = mpxd.modules.scurve;

     s.initializeScurve(function() {
     s.GenerateScurve(data.data, '.scurve-container');
     });*/
    mpxd.modules.general.GenerateGeneralview(data);
    var $el = $("#portlet_" + data.id);
    elelel = $el;
    var currentProgress = parseFloat(data.data.currentActual);
    var remainingProgress = 100 - currentProgress;
    $el.find('#chart_' + data.id + "_progress").highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: 0,
            plotShadow: false,
            margin: [0, 0, 0, 0],
            spacingTop: 0,
            spacingBottom: 0,
            spacingLeft: 0,
            spacingRight: 0
        },
        title: {
            text: currentProgress + '%',
            style: {
                color: '#9EDD2E',
                fontSize: '250%',
                fontWeight: 'bold'
            },
            align: 'center',
            verticalAlign: 'middle',
            y: 10
        },
        tooltip: {
            pointFormat: '{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                dataLabels: {
                    enabled: false,
                    distance: -50,
                    style: {
                        fontWeight: 'bold',
                        color: 'white',
                        textShadow: '0px 1px 2px black'
                    }
                },
                startAngle: 0,
                endAngle: 360
            }
        },
        series: [{
            type: 'pie',
            innerSize: '98%',
            data: [
                {
                    name: 'Completed',
                    y: currentProgress,
                    color: '#15A6E9'
                },
                {
                    name: 'Remaining',
                    y: remainingProgress,
                    color: 'rgba(0,0,0,0.2)'
                },
            ]
        }]
        ,
        credits: {
            enabled: false
        }
    });

}

/*
 mpxd.modules.manufacturing_progress_chart = {}
 mpxd.modules.manufacturing_progress_chart.train_progress = Backbone.View.extend({
 initialize: function(options) {
 //console.log(options);
 this.data = options.data;
 this.render();
 },
 render: function() {
 }
 })*/

mpxd.constructors.train_manufacturing_testing = function(data) {
    mpxd.modules.general.GenerateGeneralview(data);

}

mpxd.constructors.train_manufacturing_phase = function(data) {
    console.log('train manufact');
    console.log(data);
    mpxd.modules.general.GenerateGeneralview(data);
}

mpxd.constructors.train_manufacturing_progress = function(data) {
    //mpxd.modules.general.GenerateGeneralview(data);

    //var data = items;
    var el = "#portlet_" + data.id;
    return new mpxd.modules.manufacturing_progress_chart.train_progress({data: data, el: el});

    /*

     */
}

mpxd.modules.manufacturing_progress_chart = {}
mpxd.modules.manufacturing_progress_chart.train_progress = Backbone.View.extend({
    initialize: function(options) {
        //console.log(options);
        this.data = options.data;
        this.render();
    },
    render: function() {
        var that = this;
        var html = mpxd.getTemplate("train_manufacturing_progress");
        template = _.template(html, {data: that.data});

        that.$el.html(template);
        that.$el.find('.content').mCustomScrollbar({theme: 'rounded'});
        //Static Needs Change
        that.data.maxJobs = 10000;
        var c_data_date="?date="+moment($("#et_data_date").val(), "DD-MMM-YY").format("YYYY-MM-DD");
        var date_over=[];
        mpxd.getJSONData("outStandingProgress"+c_data_date+"", function (result) {
            outstanding=(JSON.parse(JSON.stringify(result)));
            for (var j in outstanding ) {
               date_over.push((result[j]['OUT_DATE']));
                j=j+2;
            }
            //for(var i=0;i<result.length; i++){
            //        that.data.maxJobs=((parseInt(result[i]['TARGET']))> that.data.maxJobs)?parseInt(result[i]['TARGET']):that.data.maxJobs;
            //}
        });
        var generic = {
            title: {
                text: ''
            },
            xAxis: {
                type: "datetime",
                categories:date_over,
               // categories: ["20/08/2015", "27/08/2015", "03/09/2015", "10/09/2015", "17/09/2015", "24/09/2015", "01/10/2015", "08/10/2015", "15/10/2015", "22/10/2015", "29/10/2015", "05/11/2015", "12/11/2015", "19/11/2015", "26/11/2015", "03/12/2015", "10/12/2015", "17/12/2015", "24/12/2015", "31/12/2015", "07/01/2016", "14/01/2016", "21/01/2016", "28/01/2016", "04/02/2016", "11/02/2016", "18/02/2016", "25/02/2016", "03/03/2016", "10/03/2016", "17/03/2016", "24/03/2016", "31/03/2016", "07/04/2016", "14/04/2016", "21/04/2016", "28/04/2016", "05/05/2016", "12/05/2016", "19/05/2016", "26/05/2016", "02/06/2016", "09/06/2016", "16/06/2016", "23/06/2016", "30/06/2016", "07/07/2016", "14/07/2016", "21/07/2016", "28/07/2016", "04/08/2016"],
                labels: {
                    rotation: 90,
                    step: 2
                }
            },
            yAxis: {
                title: {
                    text: 'Number of jobs done'
                },
                plotLines: [{
                    value: 0,
                    width: 1
                }],
                min: 200,
                max: that.data.maxJobs
            },
            tooltip: {
                formatter: function(){
                    var isDoneAvailable = typeof this.points[1] != 'undefined';

                    if (isDoneAvailable) {
                        var seriesDone = this.points[0].series;
                        var doneValue = this.points[0].y;
                        var percentDone = parseFloat((doneValue/that.data.maxJobs)*100).toFixed(0);
                        var seriesTarget = this.points[1].series;
                        var targetValue = this.points[1].y;
                    } else {
                        var seriesTarget = this.points[0].series;
                        var targetValue = this.points[0].y;
                    }





                    var html = '<b>'+this.x+'</b><br>';
                    if(isDoneAvailable) html += '<span style="color:'+seriesDone.color+'">'+seriesDone.name+'</span>: <b>'+doneValue+'</b> ('+percentDone+'%)<br/>';
                    html += '<span style="color:'+seriesTarget.color+'">'+seriesTarget.name+'</span>: <b>'+targetValue+'</b><br/>';
                    return html;

                },
                shared: true
            },
            legend: {
                layout: 'horizontal',
                align: 'center',
                verticalAlign: 'bottom',
                borderWidth: 0
            },
            series: [],
            credits: {
                enabled: false
            }
        };


        //var major_works = _.clone(generic);
        var open_item = {
            chart: {
                type: 'column'
            },
            title: {
                text: ''
            },
            subtitle: {
                text: 'Overall Open Item Closure'
            },
            xAxis: {
                title: {
                    text: 'Train #'
                }
            },
            yAxis: {
                min: 0,
                max: 100,
                title: {
                    text: 'Number of jobs (%)'
                }
            },
            tooltip: {

                formatter: function(){
                    //console.log(this,a,b,c);
                    var index = open_item['xAxis']['categories'].indexOf(this.x);

                    var seriesOpen = this.points[0].series;
                    var seriesClosed = this.points[1].series;

                    var percentOpen = this.y;
                    var percentClosed = seriesClosed['data'][index]['y'];

                    var originalOpen = seriesOpen['data'][index]['original'];
                    var originalClosed = seriesClosed['data'][index]['original'];

                    var html = '<b>Train: '+this.x+'</b><br>';
                    html += '<span style="color:'+seriesOpen.color+'">'+seriesOpen.name+'</span>: <b>'+originalOpen+'</b> ('+percentOpen+'%)<br/>';
                    html += '<span style="color:'+seriesClosed.color+'">'+seriesClosed.name+'</span>: <b>'+originalClosed+'</b> ('+percentClosed+'%)<br/>';
                    return html;

                },
                shared: true
            },
            series: [],
            plotOptions: {
                column: {
                    /*,
                     events: {
                     legendItemClick: function () {
                     return false;
                     }
                     }*/
                }
            },
            credits: {
                enabled: false
            }
        }
        var overall_progress = _.clone(generic);

        /*major_works['subtitle'] = {
         text: 'Major Works Completion Progress'
         };
         major_works['series'][0]['data'] = [7.0, 10, 19.5, 26.5, 44, 55, 66, 78, 82, 94, 100];
         */
        open_item['subtitle'] = {
            text: 'Overall Progress Per Train'
        };

        open_item['xAxis']['categories'] = [];
        var xAxis = [];
        /*		for (var i = 1; i < 22; i++) {
         open_item['xAxis']['categories'].push('Train '+ ((i < 10) ? '0' : '') + i);
         }*/
        /*        var openJobs = [172, 135, 102, 93, 139, 124, 115, 100, 102, 103, 119, 105, 68, 70, 73, 61, 83, 66, 57, 62, 52];
         var closedJobs = [149, 101, 100, 121, 82, 66, 53, 43, 43, 47, 66, 52, 81, 93, 93, 116, 90, 97, 102, 97, 99];*/
        var open=[];
        var openJobs=[];
        var closedJobs = [];
        var openData = [];
        var closedData = [];
        mpxd.getJSONData("getOverallProgress"+c_data_date+"", function (result) {
            for (var i = 0; i <result.length; i++) {
                //open_item['xAxis']['categories'].push('Train '+ ((i < 10) ? '0' : '') + i);
                open_item['xAxis']['categories'].push(((parseInt(result[i]['TRAIN_NO']) < 10) ? '0' : '') + parseInt(result[i]['TRAIN_NO']));
                xAxis.push(((parseInt(result[i]['TRAIN_NO']) < 10) ? '0' : '') + parseInt(result[i]['TRAIN_NO']));
            }
            open=(JSON.parse(JSON.stringify(result)));
            for (var j in open ) {
                openJobs.push(parseInt(result[j]['OPEN_JOBS']));
                closedJobs.push(parseInt(result[j]['CLOSED_JOBS']));

            }
            //var openJobs   = [ 0, 0, 62, 62, 57, 77, 89, 51, 52, 42, 72, 38, 35, 58, 58, 55, 61, 54, 62, 50, 52, 67, 38, 0, 55, 43, 45, 46, 59];
            //var closedJobs = [ 0, 0, 55, 59, 63, 61, 53, 63, 66, 71, 66, 82, 84, 74, 83, 89, 80, 85, 83, 91, 82, 88, 88, 0, 88, 90, 90, 92, 93];

            for (var i = 0; ((i < openJobs.length) && (i < closedJobs.length)); i++) {
                var total = openJobs[i]+closedJobs[i];
                //Modified By Sebin
                //var openPercent = parseInt((openJobs[i]/total)*100);
                //var closedPercent = parseInt((closedJobs[i]/total)*100);
                var openPercent = (isNaN(parseInt((openJobs[i]/total)*100))?0:parseInt((openJobs[i]/total)*100));
                var closedPercent = (isNaN(parseInt((closedJobs[i]/total)*100))?0:parseInt((closedJobs[i]/total)*100));
                openData.push({
                    y: openPercent,
                    original: openJobs[i]
                });
                closedData.push({
                    y: closedPercent,
                    original: closedJobs[i]
                });
            }
            open_item['series'].push({
                name: 'Open Jobs',
                data: openData
            });
            // Closed jobs
            open_item['series'].push({
                name: 'Closed Jobs',
                data: closedData
            });
            //that.$el.find('.progress-chart-2').highcharts(open_item);

            //modified by agaile on 19/05/2016
             //Start Here
            that.$el.find('.progress-chart-2').highcharts({
                chart: {
                    type: 'column'
                },
                title:{
                    text:''
                },
                subtitle: {
                    text: 'Overall Progress Per Train'
                },
                xAxis: {
                    categories: xAxis,
                    title: {
                        text: 'Train #'
                    }
                },
                yAxis: {
                    min: 0,
                    max:100,
                    title: {
                        text: 'Number of Jobs(%)'
                    },
                    stackLabels: {
                        style: {
                            fontWeight: 'bold',
                            color: (Highcharts.theme && Highcharts.theme.textColor) || 'white'
                        }
                    }
                },
                legend: {
                    align: 'right',
                    x: -0,
                    verticalAlign: 'top',
                    y: 0,
                    floating: true,
                    backgroundColor: (Highcharts.theme && Highcharts.theme.background2) || 'white',
                    borderColor: '#CCC',
                    borderWidth: 1,
                    shadow: false
                },
                tooltip: {
                    headerFormat: '<b>Train {point.x}</b><br/>',
                    pointFormat: '{series.name}: {point.y}'
                },
                plotOptions: {
                    column: {
                        stacking: 'normal',
                        dataLabels: {
                            enabled: false,
                            color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white',
                            style: {
                                textShadow: '0 0 3px grey'
                            }
                        }
                    }
                },
                series: [{
                    name: 'Open Jobs',
                    data: openData
                }, {
                    name: 'Closed Jobs',
                    data: closedData
                }]
            });

            //End Here
        });
        var closedJ=[];
        var openJ=[];
        var train=[];
        var trainData=[];
        var fullyResult=[];
        var flag = 0;
        mpxd.getJSONData("getCompletedT"+c_data_date+"", function (result) {
            var temp=[];
            fullyResult=(JSON.parse(JSON.stringify(result)));
            for (var j in fullyResult ) {
                openJ.push(parseInt(result[j]['OPEN_JOBS'])); // values
                closedJ.push(parseInt(result[j]['CLOSED_JOBS'])); // values
                trainData.push(parseInt(result[j]['TRAIN_NUMBER']));// all data
                train.push(parseInt(result[j]['TRAIN_NO'])); // condition statisfied data
            }
            var td="";
            var actual=((closedJ.length/58)*100).toFixed(2); // no of fully completed perc
            if(actual==0 || actual==100){ // to trim trim decimal places for zero and 100
                actual=((closedJ.length/58)*100);
            }
                for(var j = 0; j < train.length; j++){
                    for (var i = 0; i < trainData.length; i++) {
                        var total = openJ[i]+closedJ[i];
                        var closedPercent = (isNaN(parseInt((closedJ[i]/total)*100))?0:parseInt((closedJ[i]/total)*100));
                        //alert('maverick');
                        if((closedPercent==100) && (trainData[i]==train[j]) ){
                            flag =1;
                            //alert('CJ '+closedPercent);
                            temp.push(trainData[i]);
                            td+="<tr><td>Train "+ trainData[i]+"</td></tr>";
                        }
                    }
                }

            if(flag == 0) // to show if there is not completed trains
            {
                $('#id_tabHed').text("No Trains Completed Yet");
            }

         $('#id_fullyTrain').text(((temp.length<=9)&&(temp.length!=0)?"0"+temp.length:temp.length));
           var perc = ((temp.length/58)*100).toFixed(2)+"%";
            $('#id_actual').text(perc);
            $('#id_fullyTable').append(td);
            //Train head percemntage fillng logic : start
            d3.xml("/mpxd/assets/img/mrt_train_diagram_head.svg", "image/svg+xml", function(error, xml) {
                if (error) throw error
                document.getElementById('train_progress_container').appendChild(xml.documentElement);

                d3.select('#progress stop').attr('offset',perc);
                <!--d3.select('#progress stop').attr('offset','60%');-->

                //Train head percemntage fillng logic : end

            });
        });

        //var openJobs   = [ 0, 0, 62, 62, 57, 77, 89, 51, 52, 42, 72, 38, 35, 58, 58, 55, 61, 54, 62, 50, 52, 67, 38, 0, 55, 43, 45, 46, 59];
        //var closedJobs = [ 0, 0, 55, 59, 63, 61, 53, 63, 66, 71, 66, 82, 84, 74, 83, 89, 80, 85, 83, 91, 82, 88, 88, 0, 88, 90, 90, 92, 93];

       /* var openData = [];
        var closedData = [];

        for (var i = 0; ((i < openJobs.length) && (i < closedJobs.length)); i++) {
            var total = openJobs[i]+closedJobs[i];
            //Modified By Sebin
            //var openPercent = parseInt((openJobs[i]/total)*100);
            //var closedPercent = parseInt((closedJobs[i]/total)*100);
            var openPercent = (isNaN(parseInt((openJobs[i]/total)*100))?0:parseInt((openJobs[i]/total)*100));
            var closedPercent = (isNaN(parseInt((closedJobs[i]/total)*100))?0:parseInt((closedJobs[i]/total)*100));
            openData.push({
                y: openPercent,
                original: openJobs[i]
            });
            closedData.push({
                y: closedPercent,
                original: closedJobs[i]
            });
        }*/

        // Open jobs
       /* open_item['series'].push({
            name: 'Open Jobs',
            data: openData
        });

        // Closed jobs
        open_item['series'].push({
            name: 'Closed Jobs',
            data: closedData
        })*/

        overall_progress['subtitle'] = {
            text: 'Outstanding Item Completion Progress'
        };
        var outstanding=[];
        var target=[];
        var jobsdone=[];
        mpxd.getJSONData("outStandingProgress"+c_data_date+"", function (result) {
            outstanding=(JSON.parse(JSON.stringify(result)));
            for (var j in outstanding ) {
                if(!isNaN(parseInt(result[j]['JOBS_DONE'])))
                {
                    jobsdone.push(parseInt(result[j]['JOBS_DONE']));
                }
                target.push(parseInt(result[j]['TARGET']));
            }
            overall_progress['series'].push({
                name: 'Jobs done',
                data:jobsdone
                //data: [0, 30, 67, 104, 141, 178, 215, 252, 289, 326, 363, 399, 436, 473, 510, 547, 584, 621, 658, 695, 720, 780, 810, 840, 884, 910, 920, 950, 970, 1020]
            });
            overall_progress['series'].push({
                name: 'Target',
                data:target
                // data: [0, 50, 100, 150, 200, 250, 300, 350, 400, 450, 500, 550, 600, 650, 700, 750, 800, 850, 900, 950, 1000, 1050, 1100, 1150, 1200, 1250, 1300, 1350, 1400, 1450, 1500, 1550, 1600, 1650, 1700, 1750, 1800, 1850, 1900, 1950, 2000, 2050, 2100, 2150, 2200, 2250, 2300, 2350, 2400, 2450, 2500]
            });
            that.$el.find('.progress-chart-3').highcharts(overall_progress);
        });
       // overall_progress['series'].push({name: 'Jobs done',data: [0, 30, 67, 104, 141, 178, 215, 252, 289, 326, 363, 399, 436, 473, 510, 547, 584, 621, 658, 695, 720, 780, 810, 840, 884, 910, 920, 950, 970, 1020]});
       // overall_progress['series'].push({name: 'Target',data: [0, 50, 100, 150, 200, 250, 300, 350, 400, 450, 500, 550, 600, 650, 700, 750, 800, 850, 900, 950, 1000, 1050, 1100, 1150, 1200, 1250, 1300, 1350, 1400, 1450, 1500, 1550, 1600, 1650, 1700, 1750, 1800, 1850, 1900, 1950, 2000, 2050, 2100, 2150, 2200, 2250, 2300, 2350, 2400, 2450, 2500]});


        //that.$el.find('.progress-chart-1').highcharts(major_works);
       // that.$el.find('.progress-chart-2').highcharts(open_item);
      //  that.$el.find('.progress-chart-3').highcharts(overall_progress);
        //that.$el.find('#chart_'+that.data.id).highcharts({
        /*var chart = new Highcharts.Chart({
         title: {
         text: '',
         x: -20 //center
         },
         xAxis: {
         categories: that.data.categories,
         tickInterval: 3,
         labels: {
         rotation: 270,
         //step: 3,
         style: {
         color: '#ffd461',
         font: '11px Trebuchet MS, Verdana, sans-serif'
         }
         }
         },
         yAxis: {
         min: 0,
         max: 100,
         tickInterval: 10,
         labels: {
         style: {
         color: '#ffd461',
         font: '11px Trebuchet MS, Verdana, sans-serif'
         }
         },
         title: {
         text: '%',
         style: {
         color: '#ffd461',
         font: '11px Trebuchet MS, Verdana, sans-serif'
         },
         margin: 0
         },
         plotLines: [{
         value: 0,
         width: 1,
         color: '#333'
         }],
         gridLineColor: '#333'
         },
         tooltip: {
         enabled: true,
         //formatter: function() { return this.series.name; },
         //valueSuffix: '%'
         formatter: function(evt) {
         var current = this.series.data;
         //console.log(current[current.length - 1].category);
         var tooltip;
         if (current[current.length - 1].series.name === 'Actual' && current[current.length - 1].y === this.y) {
         tooltip = '<span style="color:#EBFF00">Current ' + this.series.name + ' (' + current[current.length - 1].category + ')</span>: <b>' + current[current.length - 1].y + '%</b><br/>';
         return tooltip;
         }
         else {
         return false
         }
         ;
         }
         },
         legend: {
         enabled: false,
         layout: 'vertical',
         align: 'right',
         verticalAlign: 'middle',
         borderWidth: 0
         },
         series: [{
         name: 'Early',
         data: that.data.earlyData,
         color: '#04B152',
         enableMouseTracking: false,
         }, {
         name: 'Late',
         data: that.data.delayedData,
         color: '#0070C0',
         enableMouseTracking: false,
         }, {
         name: 'Actual',
         data: that.data.actualData,
         color: '#FF0000',

         }],
         plotOptions: {
         series: {
         marker: {
         enabled: false
         }
         }
         },
         credits: {
         enabled: false
         },
         chart: {
         type: 'spline',
         backgroundColor: '#222',
         renderTo: 'chart_' + that.data.id,
         }


         });
         */
    }
});



mpxd.modules.double_pier_view = {};
mpxd.modules.double_pier_view.View = Backbone.View.extend({
    initialize: function(options) {
        this.data = options.data;
        this.render();
    },
    render: function() {
        var that = this;
        var html = mpxd.getTemplate("double_pier_view");

        template = _.template(html, {data: that.data});
        that.$el.html(template);
    }
});

mpxd.constructors.double_pier_view = function(items) {
    var el = "#portlet_" + items.id
    return new mpxd.modules.double_pier_view.View({data: items, el: el});
}



mpxd.modules.single_pier_view = {};
mpxd.modules.single_pier_view.View = Backbone.View.extend({
    initialize: function(options) {
        this.data = options.data;
        this.render();
    },
    render: function() {
        var that = this;
        var html = mpxd.getTemplate("single_pier_view");

        template = _.template(html, {data: that.data});
        that.$el.html(template);
    }
});

mpxd.constructors.single_pier_view = function(items) {
    var el = "#portlet_" + items.id
    return new mpxd.modules.single_pier_view.View({data: items, el: el});
}


mpxd.modules.viaduct_pier_view = {};
mpxd.modules.viaduct_pier_view.View = Backbone.View.extend({
    initialize: function(options) {
        this.data = options.data;
        this.render();
    },
    render: function() {
        var that = this;
        var html = mpxd.getTemplate("viaduct_pier_view");

        template = _.template(html, {data: that.data});
        that.$el.html(template);
        // that.$el.find('.content').mCustomScrollbar({theme: 'rounded'});

        //var pierdata = getPierData([currentSlug]);
        //asdzxc = that.data.data;
        var data = [];
        var pierdata = that.data.data;
        //["V1","DD01","PS3-C","DS39.8N",3.20343,101.58672,"",""]

        $.each(pierdata, function(idx,i){
            /* Before database pierdata
             var via = i[0];
             var pnum = i[1];
             var ptyp = i[2];
             var styp = i[3];
             var lat = i[4];
             var lng = i[5];

             var lat2 = i[6];
             var lng2 = i[7];
             var pierstatus = (typeof that.data.data[pnum] != "undefined") ? that.data.data[pnum].pierstatus : undefined;
             var spanstatus = (typeof that.data.data[pnum] != "undefined") ? that.data.data[pnum].spanstatus : undefined;
             var l_pierstatus = (typeof that.data.data[pnum] != "undefined") ? that.data.data[pnum].l_pierstatus : undefined;
             var l_spanstatus = (typeof that.data.data[pnum] != "undefined") ? that.data.data[pnum].l_spanstatus : undefined;
             */

            var pnum = idx;
            var isPortal = (i.pierstatus.length == 7)
            var spanType = (i.spanstatus.length == 4) ? "triple" : ((i.spanstatus.length == 3) ? "double" : "single")
            var pierstatus = (typeof that.data.data[pnum] != "undefined") ? that.data.data[pnum].pierstatus : undefined;
            var spanstatus = (typeof that.data.data[pnum] != "undefined") ? that.data.data[pnum].spanstatus : undefined;
            var l_pierstatus = (typeof that.data.data[pnum] != "undefined") ? that.data.data[pnum].l_pierstatus : undefined;
            var l_spanstatus = (typeof that.data.data[pnum] != "undefined") ? that.data.data[pnum].l_spanstatus : undefined;

            if (isPortal) {
                //Double pier here
                data.push({"pier":{id:pnum,"type":"double","status":pierstatus,"l_status":l_pierstatus}, "span":{"type":spanType,"status":spanstatus,"l_status":l_spanstatus}});
            } else {
                //Single pier here
                data.push({"pier":{id:pnum,"type":"single","status":pierstatus,"l_status":l_pierstatus}, "span":{"type":spanType,"status":spanstatus,"l_status":l_spanstatus}});
            }
        });


        var margin = {top: -5, right: -5, bottom: -5, left: -5}//,


        //	height = 500 - margin.top - margin.bottom;

        var getdim = function(){
            if (typeof this.width == "undefined") this.width = parseInt($('.piermap').css('width'));
            if (typeof this.height == "undefined") this.height = parseInt($('.piermap').css('height'));
            if ((this.width == 0) || (typeof getUrlParameter("width") != "undefined")) {
                this.width = (typeof getUrlParameter("width") != "undefined") ? getUrlParameter("width") : 1280 ;
            }
            return [this.width,this.height];
        }


        var pan = function() {
            //console.log(d3.event);
            var event = d3.event;
            var evtype = event.sourceEvent.type;
            if (evtype == "mousemove") {
                /* Mouse pan is too buggy: */
                //svg.attr("transform", "translate(" + [d3.event.translate[0],d3.event.translate[1]] + ")");
            } else if (evtype == "wheel") {
                //console.log(d3.event); //return;
                if (typeof pan.ylimit == "undefined") pan.ylimit = 0;
                current_translate = d3.transform(svg.attr("transform")).translate;
                //console.log(current_translate);
                dx = event.sourceEvent.wheelDeltaX + current_translate[0];
                dy = event.sourceEvent.wheelDeltaY + current_translate[1];
                //console.log(dx, dy);
                if (dy > 50) dy = 50;
                if (dy < pan.ylimit) dy = pan.ylimit;
                svg.attr("transform", "translate(" + [dx,dy] + ")");
            }
            return false;
            /* Old function for zooming
             /* Logic is flawed. Please rewrite constraint whenever have time *
             var t = d3.event.translate,
             s = d3.event.scale,
             dim = getdim(),
             width = dim[0],
             height = dim[1],
             rightConstraint = width - (t[0]/(1-s));

             rightConstraint = (isFinite(rightConstraint) ? rightConstraint : t[0]);

             t[0] = Math.min(50, t[0]); /* Left constraint *
             t[1] = Math.min(50, t[1]); /* Top constraint *

             container.attr("transform", "translate(" + d3.event.translate + ")scale(" + d3.event.scale + ")");*/
        }
        /*
         var dragstarted = function(d) {
         d3.event.sourceEvent.stopPropagation();
         d3.select(this).classed("dragging", true);
         }

         var dragged = function(d) {
         d3.select(this).attr("cx", d.x = d3.event.x).attr("cy", d.y = d3.event.y);
         }

         var dragended = function(d) {
         d3.select(this).classed("dragging", false);
         }*/

        var zoom = d3.behavior.zoom()
            .scale(0.8)
            .scaleExtent([0.8, 10])
            .on("zoom", pan)



        /*var drag = d3.behavior.drag()
         .origin(function(d) { return d; })
         .on("dragstart", dragstarted)
         .on("drag", dragged)
         .on("dragend", dragended);
         */
        svg = d3.select(that.$el.find('.content .piermap')[0]).append("svg")
            .attr("width", "100%")//width + margin.left + margin.right)
            .attr("height", "100%")
            .attr("fill", "#202020")
            //.call(zoom)
            .on("dblclick.zoom", null)
            .append("g")
            .attr("transform", "translate(" + 50 + "," + 50 + ")")
            .attr("id","maingroup")

        var defs = svg.append("svg:defs")
        var filter = defs.append("svg:filter")
            .attr("x","-0.3")
            .attr("y","-0.1")
            .attr("width","1.6")
            .attr("height","1.2")
            .attr("id","textbg")
            .append("svg:feFlood")
            .attr("flood-color","#111111")
        filter.append("svg:feComposite")
            .attr("in","SourceGraphic")

        var rect = svg.append("rect")
            .attr("width", "100%")
            .attr("height", "90%")
            .style("fill", "none")
            .style("pointer-events", "all");

        var container = svg.append("g")
            .attr("id","viewport")
            .attr("transform","scale(0.8)");
        /*
         container.append("g")
         .attr("class", "x axis")
         .selectAll("line")
         .data(d3.range(0, width, 10))
         .enter().append("line")
         .attr("x1", function(d) { return d; })
         .attr("y1", 0)
         .attr("x2", function(d) { return d; })
         .attr("y2", height);

         container.append("g")
         .attr("class", "y axis")
         .selectAll("line")
         .data(d3.range(0, height, 10))
         .enter().append("line")
         .attr("x1", 0)
         .attr("y1", function(d) { return d; })
         .attr("x2", width)
         .attr("y2", function(d) { return d; });

         */


        var getItsColor = function(p) {
            if (p >= 100) return "rgb(90, 255, 92)"
            if (p > 0) return "rgb(255, 198, 53)"
            return "#CCCCCC";
        }


        var gotoSingle = function(id,phead,pier_l,pcap_l,pile_l,l_phead,l_pier_l,l_pcap_l,l_pile_l){
            /* Last week data is not in yet! */
            location.href="singlepiers?d={0},{1},{2},{3},{4},{5},{6},{7},{8}".format(id,phead,pier_l,pcap_l,pile_l,l_phead,l_pier_l,l_pcap_l,l_pile_l);
        }
        var gotoDouble = function(id,phead,pier_l,pcap_l,pile_l,pier_r,pcap_r,pile_r,l_phead,l_pier_l,l_pcap_l,l_pile_l,l_pier_r,l_pcap_r,l_pile_r){
            /* Last week data is not in yet! */
            //console.log(pile_r);
            location.href="doublepiers?d={0},{1},{2},{3},{4},{5},{6},{7},{8},{9},{10},{11},{12},{13},{14}".format(id,phead,pier_l,pcap_l,pile_l,pier_r,pcap_r,pile_r,l_phead,l_pier_l,l_pcap_l,l_pile_l,l_pier_r,l_pcap_r,l_pile_r)
        }

        var addSingleSpan = function(id, xy, d) {
            var span = container.append("g")
                .attr("transform","translate("+xy.join(',')+")")


            var parapet_s = 0;
            var span_s = 0;

            if (typeof d != "undefined") {
                parapet_s = d[0];
                span_s = d[1];
            }

            /* Parapet */
            span.append("rect")
                .attr("x","47")
                .attr("y","9")
                .attr("width","155")
                .attr("height","5")
                .attr("fill",getItsColor(parapet_s))
                .style("stroke-width",0.9)
                .style("stroke", "#000000")

            /* Span */
            span.append("rect")
                .attr("x","47")
                .attr("y","17.75")
                .attr("width","155")
                .attr("height","12")
                .attr("fill",getItsColor(span_s))
                .style("stroke-width",0.9)
                .style("stroke", "#000000")

            /* Hack to include text background, from http://stackoverflow.com/questions/12260370/draw-text-in-svg-but-remove-background */
            span.append("svg:use")
                .attr("xlink:href","#spantext"+id)
                .attr("filter","url(#textbg)")
                .attr("fill","black")

            span.append("svg:text")
                .attr("dx","0")
                .attr("dy","0")
                .attr("transform","translate(125,70)")
                .attr("id","spantext"+id)
                .attr("fill","#ffffff")
                .style("font-family","Arial Unicode MS")
                .style("font-size","11px")
                .style("text-anchor","middle")
                .text("Span "+id)
                .attr("class","normaltext");

        }

        var addDoubleSpan = function(id, xy, d) {
            var span = container.append("g")
                .attr("transform","translate("+xy.join(',')+")")

            var parapet_s = 0;
            var span_s_t = 0;
            var span_s_b = 0;

            if (typeof d != "undefined") {
                parapet_s = d[0];
                span_s_t = d[1];
                span_s_b = d[2];
            }

            /* Parapet */
            span.append("rect")
                .attr("x","47")
                .attr("y","-6")
                .attr("width","155")
                .attr("height","4")
                .attr("fill",getItsColor(parapet_s))
                .style("stroke-width",0.9)
                .style("stroke", "#000000")

            /* Span Top*/
            span.append("rect")
                .attr("x","47")
                .attr("y","2")
                .attr("width","155")
                .attr("height","12")
                .attr("fill",getItsColor(span_s_t))
                .style("stroke-width",0.9)
                .style("stroke", "#000000")


            /* Span Bottom */
            span.append("rect")
                .attr("x","47")
                .attr("y","17.75")
                .attr("width","155")
                .attr("height","12")
                .attr("fill",getItsColor(span_s_b))
                .style("stroke-width",0.9)
                .style("stroke", "#000000")

            /* Hack to include text background, from http://stackoverflow.com/questions/12260370/draw-text-in-svg-but-remove-background */

            /* Span Text Top */
            span.append("svg:use")
                .attr("xlink:href","#spantext_t"+id)
                .attr("filter","url(#textbg)")
                .attr("fill","black")

            span.append("svg:text")
                .attr("dx","0")
                .attr("dy","0")
                .attr("transform","translate(125,60)")
                .attr("id","spantext_t"+id)
                .attr("fill","#ffffff")
                .style("font-family","Arial Unicode MS")
                .style("font-size","9px")
                .style("text-anchor","middle")
                .text("Span "+id+" A")
                .attr("class","normaltext");

            /* Hack to include text background, from http://stackoverflow.com/questions/12260370/draw-text-in-svg-but-remove-background */

            /* Span Text Bottom */
            span.append("svg:use")
                .attr("xlink:href","#spantext_b"+id)
                .attr("filter","url(#textbg)")
                .attr("fill","black")

            span.append("svg:text")
                .attr("dx","0")
                .attr("dy","0")
                .attr("transform","translate(125,120)")
                .attr("id","spantext_b"+id)
                .attr("fill","#ffffff")
                .style("font-family","Arial Unicode MS")
                .style("font-size","9px")
                .style("text-anchor","middle")
                .text("Span "+id+" B")
                .attr("class","normaltext");

        }

        var addTripleSpan = function(id, xy, d) {
            var span = container.append("g")
                .attr("transform","translate("+xy.join(',')+")")

            var parapet_s = 0;
            var span_s_t = 0;
            var span_s_b = 0;
            var span_s_b2 = 0;

            if (typeof d != "undefined") {
                parapet_s = d[0];
                span_s_t = d[1];
                span_s_b = d[2];
                span_s_b2 = d[3];
            }

            /* Parapet */
            span.append("rect")
                .attr("x","47")
                .attr("y","-21.75")
                .attr("width","155")
                .attr("height","4")
                .attr("fill",getItsColor(parapet_s))
                .style("stroke-width",0.9)
                .style("stroke", "#000000")

            /* Span Top*/
            span.append("rect")
                .attr("x","47")
                .attr("y","-13.75")
                .attr("width","155")
                .attr("height","12")
                .attr("fill",getItsColor(span_s_t))
                .style("stroke-width",0.9)
                .style("stroke", "#000000")


            /* Span Middle */
            span.append("rect")
                .attr("x","47")
                .attr("y","2")
                .attr("width","155")
                .attr("height","12")
                .attr("fill",getItsColor(span_s_b))
                .style("stroke-width",0.9)
                .style("stroke", "#000000")


            /* Span Bottom2 */
            span.append("rect")
                .attr("x","47")
                .attr("y","17.75")
                .attr("width","155")
                .attr("height","12")
                .attr("fill",getItsColor(span_s_b2))
                .style("stroke-width",0.9)
                .style("stroke", "#000000")

            /* Hack to include text background, from http://stackoverflow.com/questions/12260370/draw-text-in-svg-but-remove-background */

            /* Span Text Top */
            span.append("svg:use")
                .attr("xlink:href","#spantext_t"+id)
                .attr("filter","url(#textbg)")
                .attr("fill","black")

            span.append("svg:text")
                .attr("dx","0")
                .attr("dy","0")
                .attr("transform","translate(125,60)")
                .attr("id","spantext_t"+id)
                .attr("fill","#ffffff")
                .style("font-family","Arial Unicode MS")
                .style("font-size","9px")
                .style("text-anchor","middle")
                .text("Span "+id+" A")
                .attr("class","normaltext");

            /* Hack to include text background, from http://stackoverflow.com/questions/12260370/draw-text-in-svg-but-remove-background */

            /* Span Text Bottom */
            span.append("svg:use")
                .attr("xlink:href","#spantext_b"+id)
                .attr("filter","url(#textbg)")
                .attr("fill","black")

            span.append("svg:text")
                .attr("dx","0")
                .attr("dy","0")
                .attr("transform","translate(125,120)")
                .attr("id","spantext_b"+id)
                .attr("fill","#ffffff")
                .style("font-family","Arial Unicode MS")
                .style("font-size","9px")
                .style("text-anchor","middle")
                .text("Span "+id+" B")
                .attr("class","normaltext");

        }

        var addSinglePier = function(id, xy, d, ld) {
            var phead = 0;
            var pier_l = 0;
            var pcap_l = 0;
            var pile_l = 0;
            var	l_phead = 0;
            var	l_pier_l = 0;
            var	l_pcap_l = 0;
            var	l_pile_l = 0;

            if (typeof d != "undefined") {
                phead = d[0];
                pier_l = d[1];
                pcap_l = d[2];
                pile_l = d[3];
            }

            if (typeof ld != "undefined") {
                l_phead = ld[0];
                l_pier_l = ld[1];
                l_pcap_l = ld[2];
                l_pile_l = ld[3];
            }

            var pier = container.append("g")
                .attr("id","pier"+id)
                .attr("transform","translate("+xy.join(',')+") scale(0.1)")
                .attr("class","piergroup singlepier")
                .style("pointer-events", "all")
                .on("dblclick",function(){gotoSingle(id,phead,pier_l,pcap_l,pile_l,l_phead,l_pier_l,l_pcap_l,l_pile_l)})

            pier.append("title").html('Double click to zoom in');

            pier.append("svg:path")
                .attr("d","m 249.34131,337.47226 -198.244855,-0.0511 c 0,0 -2.168406,-71.57158 -9.547054,-106.59639 C 32.099126,185.96631 0.54837168,100.6359 0.54837168,100.6359 l 138.72764832,0 160.50539,0 c 0,0 -29.41273,84.75998 -39.83489,130.18882 -8.63192,37.62546 -10.60521,106.64754 -10.60521,106.64754 z")
                .style("stroke-width",10.2)
                .style("stroke", "#000000")
                .style("fill", getItsColor(phead))

            pier.append("svg:rect")
                .style("stroke-width",10.2)
                .style("stroke", "#000000")
                .style("fill", getItsColor(pier_l))
                .attr("width","198.19127")
                .attr("height","558.4967")
                .attr("x","51.207119")
                .attr("y","337.61234")
                .attr("ry","0.22273682")

            pier.append("svg:rect")
                .style("stroke-width",10.2)
                .style("stroke", "#000000")
                .style("fill", getItsColor(pcap_l))
                .attr("width","256.71027")
                .attr("height","94.184898")
                .attr("x","21.670496")
                .attr("y","895.42322")

            pilingg = pier.append("svg:g")
                .attr("transform","matrix(1,0,0,0.5213903,0,503.67093)")

            pilingg.append("svg:rect")
                .style("stroke-width",10.2)
                .style("stroke", "#000000")
                .style("fill", getItsColor(pile_l))
                .attr("width","41.911671")
                .attr("height","119.81321")
                .attr("x","51.235119")
                .attr("y","932.02399")
            pilingg.append("svg:rect")
                .style("stroke-width",10.2)
                .style("stroke", "#000000")
                .style("fill", getItsColor(pile_l))
                .attr("width","41.911671")
                .attr("height","119.81321")
                .attr("x","129.20053")
                .attr("y","932.02399")
            pilingg.append("svg:rect")
                .style("stroke-width",10.2)
                .style("stroke", "#000000")
                .style("fill", getItsColor(pile_l))
                .attr("width","41.911671")
                .attr("height","119.81321")
                .attr("x","207.33298")
                .attr("y","932.02399")


            /* Hack to include text background, from http://stackoverflow.com/questions/12260370/draw-text-in-svg-but-remove-background */
            pier.append("svg:use")
                .attr("xlink:href","#piertext"+id)
                .attr("filter","url(#textbg)")
                .attr("fill","black")

            pier.append("svg:text")
                .attr("dx","0")
                .attr("dy","0")
                .attr("transform","translate(150,1300)")
                .attr("id","piertext"+id)
                .attr("fill","#ffffff")
                .style("font-family","Arial Unicode MS")
                .style("font-size","112px")
                .style("text-anchor","middle")
                .text(id)
                .attr("class","bigtext");
        }

        var addDoublePier = function(id, xy, d, ld) {
            var phead = 0;
            var pier_l = 0;
            var pcap_l = 0;
            var pile_l = 0;
            var pier_r = 0;
            var pcap_r = 0;
            var pile_r = 0;

            var l_phead = 0;
            var l_pier_l = 0;
            var l_pcap_l = 0;
            var l_pile_l = 0;
            var l_pier_r = 0;
            var l_pcap_r = 0;
            var l_pile_r = 0;

            if (typeof d != "undefined") {
                phead = d[0];
                pier_l = d[1];
                pcap_l = d[2];
                pile_l = d[3];
                pier_r = d[4];
                pcap_r = d[5];
                pile_r = d[6];
            }

            if (typeof ld != "undefined") {
                l_phead = ld[0];
                l_pier_l = ld[1];
                l_pcap_l = ld[2];
                l_pile_l = ld[3];
                l_pier_r = ld[4];
                l_pcap_r = ld[5];
                l_pile_r = ld[6];
            }

            pier = container.append("g")
                .attr("id","pier"+id)
                .attr("transform","translate("+xy.join(',')+") scale(0.1)")
                .attr("class","piergroup doublepier")
                .on("dblclick",function(){gotoDouble(id,phead,pier_l,pcap_l,pile_l,pier_r,pcap_r,pile_r,l_phead,l_pier_l,l_pcap_l,l_pile_l,l_pier_r,l_pcap_r,l_pile_r)});

            pier.append("title").html('Double click to zoom in');

            /* Pier Head */
            pier.append("svg:path")
                .attr("d","m 571.17642,338.5303 -198.24486,-0.0511 c 0,0 -2.1684,-71.57158 -9.54705,-106.59639 -9.45028,-44.85846 -41.00103,-130.18888 -41.00103,-130.18888 l 138.72765,0 160.50537,0 c 0,0 -29.41271,84.75999 -39.83487,130.18883 -8.63192,37.62546 -10.60521,106.64754 -10.60521,106.64754 z")
                .style("stroke-width",10.2)
                .style("stroke", "#000000")
                .style("fill", getItsColor(phead))


            pier.append("svg:rect")
                .attr("width","798.10425")
                .attr("height","137.88963")
                .attr("x","51.099304")
                .attr("y","338.66718")
                .attr("ry","0.092159733")
                .style("stroke-width",10.2)
                .style("stroke", "#000000")
                .style("fill", getItsColor(phead))



            /* Pier Left */
            pier.append("svg:rect")
                .style("stroke-width",10.2)
                .style("stroke", "#000000")
                .style("fill", getItsColor(pier_l))
                .attr("width","198.17593")
                .attr("height","419.29205")
                .attr("x","51.136162")
                .attr("y","476.30215")
                .attr("ry","0.16721992")

            /* Pier Right */
            pier.append("svg:rect")
                .style("stroke-width",10.2)
                .style("stroke", "#000000")
                .style("fill", getItsColor(pier_r))
                .attr("width","198.17596")
                .attr("height","419.29236")
                .attr("x","651.09021")
                .attr("y","476.30154")
                .attr("ry","0.16722004")

            /* Pile Cap Left */
            pier.append("svg:rect")
                .style("stroke-width",10.2)
                .style("stroke", "#000000")
                .style("fill", getItsColor(pcap_l))
                .attr("width","256.76886")
                .attr("height","94.18502")
                .attr("x","21.768166")
                .attr("y","895.59998")

            /* Pile Cap Right */
            pier.append("svg:rect")
                .style("stroke-width",10.2)
                .style("stroke", "#000000")
                .style("fill", getItsColor(pcap_r))
                .attr("width","256.71027")
                .attr("height","94.18502")
                .attr("x","621.67944")
                .attr("y","895.59998")


            /* Piling Left */
            pilingg_l = pier.append("svg:g")
                .attr("transform","matrix(1,0,0,0.51986191,0,505.27935)");

            pilingg_l.append("svg:rect")
                .style("stroke-width",10.2)
                .style("stroke", "#000000")
                .style("fill", getItsColor(pile_l))
                .attr("width","41.911671")
                .attr("height","119.81321")
                .attr("x","51.235119")
                .attr("y","932.02399")
            pilingg_l.append("svg:rect")
                .style("stroke-width",10.2)
                .style("stroke", "#000000")
                .style("fill", getItsColor(pile_l))
                .attr("width","41.911671")
                .attr("height","119.81321")
                .attr("x","129.20053")
                .attr("y","932.02399")
            pilingg_l.append("svg:rect")
                .style("stroke-width",10.2)
                .style("stroke", "#000000")
                .style("fill", getItsColor(pile_l))
                .attr("width","41.911671")
                .attr("height","119.81321")
                .attr("x","207.33298")
                .attr("y","932.02399")

            /* Piling Right */
            pilingg_r = pier.append("svg:g")
                .attr("transform","translate(599.91125,-3.9778743e-4) matrix(1,0,0,0.51986191,0,505.27935)")

            pilingg_r.append("svg:rect")
                .style("stroke-width",10.2)
                .style("stroke", "#000000")
                .style("fill", getItsColor(pile_r))
                .attr("width","41.911671")
                .attr("height","119.81321")
                .attr("x","51.235119")
                .attr("y","932.02399")
            pilingg_r.append("svg:rect")
                .style("stroke-width",10.2)
                .style("stroke", "#000000")
                .style("fill", getItsColor(pile_r))
                .attr("width","41.911671")
                .attr("height","119.81321")
                .attr("x","129.20053")
                .attr("y","932.02399")
            pilingg_r.append("svg:rect")
                .style("stroke-width",10.2)
                .style("stroke", "#000000")
                .style("fill", getItsColor(pile_r))
                .attr("width","41.911671")
                .attr("height","119.81321")
                .attr("x","207.33298")
                .attr("y","932.02399")


            /* Hack to include text background, from http://stackoverflow.com/questions/12260370/draw-text-in-svg-but-remove-background */

            /* Pile Text Left */
            pier.append("svg:use")
                .attr("xlink:href","#piertext_l"+id)
                .attr("filter","url(#textbg)")
                .attr("fill","black")

            pier.append("svg:text")
                .attr("dx","0")
                .attr("dy","0")
                .attr("transform","translate(150,1300)")
                .attr("id","piertext_l"+id)
                .attr("fill","#ffffff")
                .style("font-family","Arial Unicode MS")
                .style("font-size","112px")
                .style("text-anchor","middle")
                .text(id+" L")
                .attr("class","bigtext");

            /* Pile Text Right */
            pier.append("svg:use")
                .attr("xlink:href","#piertext_r"+id)
                .attr("filter","url(#textbg)")
                .attr("fill","black")

            pier.append("svg:text")
                .attr("dx","0")
                .attr("dy","0")
                .attr("transform","translate(750,1300)")
                .attr("id","piertext_r"+id)
                .attr("fill","#ffffff")
                .style("font-family","Arial Unicode MS")
                .style("font-size","112px")
                .style("text-anchor","middle")
                .text(id+" R")
                .attr("class","bigtext");
        }

        /* From https://gist.github.com/andrewrk/4382935 */
        var zfill1 = function(number, size) {
            number = number.toString();
            while (number.length < size) number = "0" + number;
            return number;
        }

        var blockwidth = 160;
        var dim = getdim()
        var scale = 0.8;
        var width = (dim[0]/scale) - ((dim[0]/scale) % blockwidth) - blockwidth;

        var clevel = 0;
        var levelheight = 210;
        var x,y;

        for (var i = 0; i < data.length; i++) {
            //7 Spaces in between piers & double piers
            var current = data[i];
            var xpad = 10;
            var ypad = 10;

            var id = zfill1(i, 4);
            x = (xpad + (blockwidth*i)) % width;
            clevel = Math.floor((blockwidth/width)*i);
            y = ypad + (levelheight*clevel) + 10;

            if (typeof current.pier.type != "undefined") {
                if (current.pier.type == "single") {
                    addSinglePier(current.pier.id, [x + 30, y + 30], current.pier.status, current.pier.l_status);
                } else{
                    addDoublePier(current.pier.id, [x, y + 30], current.pier.status, current.pier.l_status);
                }
            }


            if (typeof current.span.type != "undefined") {
                if (current.span.type == "single") {
                    addSingleSpan(current.pier.id, [x, y], current.span.status, current.span.l_status);
                } else if (current.span.type == "double") {
                    addDoubleSpan(current.pier.id, [x, y], current.span.status, current.span.l_status);
                } else if (current.span.type == "triple") {
                    addTripleSpan(current.pier.id, [x, y], current.span.status, current.span.l_status);
                }
            }
            //addDoublePier(i, [160*i, 40])
            //addDoubleSpan(i, [160*i, 10])
        }
        //console.log(y);
        pan.ylimit = 0-(y*scale-dim[1])-200; /* 200 is hardcoded margin */
        //addDoublePier(123,[500]);

        var wrap = function(text, width) {
            text.each(function() {
                var text = d3.select(this),
                    words = text.text().split(/\s+/).reverse(),
                    word,
                    line = [],
                    lineNumber = 0,
                    lineHeight = 1.1, // ems
                    y = text.attr("y"),
                    dy = parseFloat(text.attr("dy")),
                    tspan = text.text(null).append("tspan").attr("x", 0).attr("y", y).attr("dy", dy + "em");
                while (word = words.pop()) {
                    line.push(word);
                    tspan.text(line.join(" "));
                    if (tspan.node().getComputedTextLength() > width) {
                        line.pop();
                        tspan.text(line.join(" "));
                        line = [word];
                        tspan = text.append("tspan").attr("x", 0).attr("y", y).attr("dy", ++lineNumber * lineHeight + dy + "em").text(word);
                    }
                }
            });
        }


        d3.selectAll('text.bigtext').call(wrap, 500);
        d3.selectAll('text.normaltext').call(wrap, 40);
        /* when finished, get our container to have the height of svg */

        d3.selectAll("svg").attr("height",parseInt(d3.selectAll('g#maingroup')[0][0].getBBox().height)*1.08+"px");

        var clone_d3_selection = function(selection, i) {
            // Assume the selection contains only one object, or just work
            // on the first object. 'i' is an index to add to the id of the
            // newly cloned DOM element.
            var attr = selection.node().attributes;
            var length = attr.length;
            var node_name = selection.property("nodeName");
            var parent = d3.select(selection.node().parentNode);
            var cloned = parent.append(node_name)
                .attr("id", selection.attr("id") + i);
            for (var j = 0; j < length; j++) {
                if (attr[j].nodeName == "id") continue;
                cloned.attr(attr[j].name,attr[j].value);
            }
            return cloned;
        }


        /* Finished loading? Need to check whether it is PDF or not */
        if (typeof getUrlParameter("print") != "undefined") {

            var $content = that.$el.children(".content");
            var maingroup = d3.select("#maingroup");
            var height = maingroup.node().getBBox().height;
            var legendHeight = 200;
            $content.css("height",legendHeight + (height*1.2));

        }
        /*
         container.append("svg:path")
         .attr("d","m 249.34131,337.47226 -198.244855,-0.0511 c 0,0 -2.168406,-71.57158 -9.547054,-106.59639 C 32.099126,185.96631 0.54837168,100.6359 0.54837168,100.6359 l 138.72764832,0 160.50539,0 c 0,0 -29.41273,84.75998 -39.83489,130.18882 -8.63192,37.62546 -10.60521,106.64754 -10.60521,106.64754 z")
         .style("stroke-width", 2)
         .style("stroke", "steelblue")
         .style("fill", "blue")
         .attr('id','testing');

         console.log(clone_d3_selection(d3.select('#testing'),'lololol'));*/
        /*
         d3.tsv("dots.tsv", dottype, function(error, dots) {
         dot = container.append("g")
         .attr("class", "dot")
         .selectAll("circle")
         .data(dots)
         .enter().append("circle")
         .attr("r", 5)
         .attr("cx", function(d) { return d.x; })
         .attr("cy", function(d) { return d.y; })
         .call(drag);
         });*/



    }
});


mpxd.constructors.viaduct_pier_view = function(items) {
    var el = "#portlet_" + items.id
    return new mpxd.modules.viaduct_pier_view.View({data: items, el: el});
}


mpxd.modules.scurve = {};
mpxd.modules.scurve.ScurveView1 = Backbone.View.extend({
    initialize: function(options) {
        //console.log(options);
        this.data = options.data;
        this.render();
    },
    render: function() {
        var that = this;
        var html = mpxd.getTemplate("scurve-1");

        template = _.template(html, {data: that.data});
        that.$el.html(template);
        that.$el.find('.content').mCustomScrollbar({theme: 'rounded'});
        //that.$el.find('#chart_'+that.data.id).highcharts({
        var chart = new Highcharts.Chart({
            title: {
                text: '',
                x: -20 //center
            },
            xAxis: {
                categories: that.data.categories,
                tickInterval: 3,
                labels: {
                    rotation: 270,
                    //step: 3,
                    style: {
                        color: '#ffd461',
                        font: '11px Trebuchet MS, Verdana, sans-serif'
                    }
                }
            },
            yAxis: {
                min: 0,
                max: 100,
                tickInterval: 10,
                labels: {
                    style: {
                        color: '#ffd461',
                        font: '11px Trebuchet MS, Verdana, sans-serif'
                    }
                },
                title: {
                    text: '%',
                    style: {
                        color: '#ffd461',
                        font: '11px Trebuchet MS, Verdana, sans-serif'
                    },
                    margin: 0
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#333'
                }],
                gridLineColor: '#333'
            },
            tooltip: {
                enabled: true,
                //formatter: function() { return this.series.name; },
                //valueSuffix: '%'
                formatter: function(evt) {
                    var current = this.series.data;
                    //console.log(current[current.length - 1].category);
                    var tooltip;
                    if (current[current.length - 1].series.name === 'Actual' && current[current.length - 1].y === this.y) {
                        tooltip = '<span style="color:#EBFF00">Current ' + this.series.name + ' (' + current[current.length - 1].category + ')</span>: <b>' + current[current.length - 1].y + '%</b><br/>';
                        return tooltip;
                    }
                    else {
                        return false
                    }
                    ;
                }
            },
            legend: {
                enabled: false,
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle',
                borderWidth: 0
            },
            series: [{
                name: 'Early',
                data: that.data.earlyData,
                color: '#04B152',
                enableMouseTracking: false
            }, {
                name: 'Late',
                data: that.data.delayedData,
                color: '#0070C0',
                enableMouseTracking: false
            }, {
                name: 'Actual',
                data: that.data.actualData,
                color: '#FF0000'
                //enableMouseTracking: false,
                /*events : {
                 mouseOver: function() {
                 console.log(this.yData[this.yData.length - 1]);
                 }
                 },*/
            }],
            plotOptions: {
                series: {
                    marker: {
                        enabled: false
                    }
                }
            },
            credits: {
                enabled: false
            },
            chart: {
                type: 'spline',
                backgroundColor: '#222',
                renderTo: 'chart_' + that.data.id
            }


        });

        /*chart.tooltip.refresh(chart.series[2].points[that.data.actualData.length - 1]); // onload render tooltip
         (function(chart) {
         chart.wrap(chart.Tooltip.prototype, 'hide', function(defaultCallback) {
         });
         }(Highcharts));*/
    }
});

mpxd.modules.scurve.ScurveView2 = Backbone.View.extend({
    initialize: function(options) {
        //console.log(options);
        this.data = options.data;
        if (typeof options.componentSelector != 'undefined') {
            this.render(options.componentSelector);
        } else {
            this.render();
        }
    },
    render: function(componentSelector) {
        // ComponentSelector is css selector for embedding S-Curve as a component, rather than a portlet
        var that = this;
        var html = mpxd.getTemplate("scurve-2");


        template = _.template(html, {data: that.data});

        if (typeof componentSelector != 'undefined') {
            var contents = $(template).find('.container');

            that.$el.find(componentSelector).html(contents);
        } else {
            that.$el.html(template);
            that.$el.find('.content').mCustomScrollbar({theme: 'rounded'});
        }

        var chart = new Highcharts.Chart({
            title: {
                text: '',
                x: -20 //center
            },
            xAxis: {
                categories: that.data.categories,
                tickInterval: 3,
                labels: {
                    rotation: 270,
                    //step: 3,
                    style: {
                        color: '#ffd461',
                        font: '11px Trebuchet MS, Verdana, sans-serif'
                    }
                }
            },
            yAxis: {
                min: 0,
                max: 100,
                tickInterval: 10,
                labels: {
                    style: {
                        color: '#ffd461',
                        font: '11px Trebuchet MS, Verdana, sans-serif'
                    }
                },
                title: {
                    text: '%',
                    style: {
                        color: '#ffd461',
                        font: '11px Trebuchet MS, Verdana, sans-serif'
                    }
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#333'
                }],
                gridLineColor: '#333'
            },
            tooltip: {
                enabled: true,
                //formatter: function() { return this.series.name; }
                formatter: function(evt) {
                    var current = this.series.data;
                    //console.log(current[current.length - 1].category);
                    var tooltip;
                    if (current[current.length - 1].series.name === 'Actual' && current[current.length - 1].y === this.y) {
                        tooltip = '<span style="color:#EBFF00">Current ' + this.series.name + ' (' + current[current.length - 1].category + ')</span>: <b>' + current[current.length - 1].y + '%</b><br/>';
                        return tooltip;
                    }
                    else {
                        return false
                    }
                    ;
                }
            },
            legend: {
                enabled: false,
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle',
                borderWidth: 0
            },
            series: [{
                name: 'Early',
                data: that.data.earlyData,
                color: '#04B152',
                enableMouseTracking: false
            }, {
                name: 'Late',
                data: that.data.delayedData,
                color: '#0070C0',
                enableMouseTracking: false
            }, {
                name: 'Actual',
                data: that.data.actualData,
                color: '#FF0000'
            }],
            plotOptions: {
                series: {
                    marker: {
                        enabled: false
                    }
                }
            },
            credits: {
                enabled: false
            },
            chart: {
                type: 'spline',
                backgroundColor: '#222',
                renderTo: 'chart_' + that.data.id
            }


        });

        /*chart.tooltip.refresh(chart.series[2].points[that.data.actualData.length - 1]); // onload render tooltip
         (function(chart) {
         chart.wrap(chart.Tooltip.prototype, 'hide', function(defaultCallback) {
         });
         }(Highcharts));*/
    }
});




mpxd.modules.scurve.initializeScurve = function(callback) {
    /* Initialize template */

    if (typeof mpxd.modules.scurve.initializedFlag == "undefined") {
        mpxd.loadTemplateAsync(["scurve-1", "scurve-2"], callback);
        mpxd.modules.scurve.initializedFlag = true;
    } else {
        if (typeof callback == "function")
            callback();
    }
}


mpxd.constructors.scurve = function(data) {
    if (typeof data.data.id == "undefined")
        data.data.id = data.id;
    if (typeof data.data.title == "undefined")
        data.data.title = data.title;
    var s = mpxd.modules.scurve;
    s.initializeScurve(function() {
        s.GenerateScurve(data.data);
    });

}




mpxd.modules.scurve.GenerateScurve = function(items, componentSelector) {
    //mpxd.modules.scurve.initializeScurve();
    var data = items;
    var el = "#portlet_" + data.id;

    var type = data.chartType;
    var view = data.viewType;
    var trend = data.trend.toLowerCase();

    data.categories = [];
    data.currentEarly = data.currentEarly.split('%')[0];
    data.currentActual = data.currentActual.split('%')[0];
    data.currentLate = data.currentLate.split('%')[0];
    //console.log(data);

    if (type == "long") {
        data.categories = ["Jan/12", "Feb/12", "Mar/12", "Apr/12", "May/12", "Jun/12", "Jul/12", "Aug/12", "Sep/12", "Oct/12", "Nov/12", "Dec/12", "Jan/13", "Feb/13", "Mar/13", "Apr/13", "May/13", "Jun/13", "Jul/13", "Aug/13", "Sep/13", "Oct/13", "Nov/13", "Dec/13", "Jan/14", "Feb/14", "Mar/14", "Apr/14", "May/14", "Jun/14", "Jul/14", "Aug/14", "Sep/14", "Oct/14", "Nov/14", "Dec/14", "Jan/15", "Feb/15", "Mar/15", "Apr/15", "May/15", "Jun/15", "Jul/15", "Aug/15", "Sep/15", "Oct/15", "Nov/15", "Dec/15", "Jan/16", "Feb/16", "Mar/16", "Apr/16", "May/16", "Jun/16", "Jul/16", "Aug/16", "Sep/16", "Oct/16", "Nov/16", "Dec/16", "Jan/17", "Feb/17", "Mar/17", "Apr/17", "May/17", "Jun/17", "Jul/17"];
    } else if (type == "short") {
        data.categories = ["Jan/12", "Apr/12", "Jul/12", "Oct/12", "Jan/13", "Apr/13", "Jul/13", "Oct/13", "Jan/14", "Apr/14", "Jul/14", "Oct/14", "Jan/15", "Apr/15", "Jul/15", "Oct/15", "Jan/16", "Apr/16", "Jul/16", "Oct/16", "Jan/17", "Apr/17", "Jul/17"];
        //data.categories = ["Jan-12", "Apr-12", "Jul-12", "Oct-12", "Jan-13", "Apr-13", "Jul-13", "Oct-13", "Jan-14", "Apr-14", "Jul-14", "Oct-14", "Jan-15", "Apr-15", "Jul-15", "Oct-15", "Jan-16", "Apr-16", "Jul-16", "Oct-16", "Jan-17", "Apr-17", "Jul-17"];
    }

    if (typeof data.startAt != "undefined") {
        var dayms = 86400000;
        var beginningD = new Date("1/"+data.categories[0]);
        var startD = new Date("1/"+data.startAt);
        var months = monthDiff(beginningD,startD);
        var quarters = months/4;
        if (type == "long") {
            data.earlyData.reverse();
            data.actualData.reverse();
            data.delayedData.reverse();
            for (var i = 0; i < months; i++) {
                data.earlyData.push(null)
                data.actualData.push(null)
                data.delayedData.push(null)
            }
            data.earlyData.reverse();
            data.actualData.reverse();
            data.delayedData.reverse();
        } else if (type == "short") {
            data.earlyData.reverse();
            data.actualData.reverse();
            data.delayedData.reverse();
            for (var i = 0; i < quarters; i++) {
                data.earlyData.push(null)
                data.actualData.push(null)
                data.delayedData.push(null)
            }
            data.earlyData.reverse();
            data.actualData.reverse();
            data.delayedData.reverse();
        }
    }

    if (trend == "up") {
        data.trendColor = "#00B050";
        data.arrowDirection = "up";
    } else if (trend == "down") {
        data.trendColor = "#FF0000"
        data.arrowDirection = "down";
    } else if (trend == "right") {
        data.trendColor = "#2E9AFE"
        data.arrowDirection = "right";
    }


    if (view == "1") {
        return new mpxd.modules.scurve.ScurveView1({data: data, el: el});
    } else if (view == "2") {
        return new mpxd.modules.scurve.ScurveView2({data: data, el: el, componentSelector: componentSelector});
    }
}






mpxd.modules.piechart_workpackage = {};
mpxd.modules.piechart_workpackage.View = Backbone.View.extend({
    initialize: function(options) {
        this.data = options.data;
        this.render();
    },
    render: function() {
        that = this;
        var html = mpxd.getTemplate("piechartworkpackage");

        template = _.template(html, {data: that.data});
        that.$el.html(template);
        asdasdasd = that.data;

        var procdata = that.data.data[0].data.procurement;
        var awarded = procdata.awarded;
        var yetcalled = procdata.yetcalled;
        var calledin = procdata.calledin;

        var ac = (_.reduce(awarded, function(memo, num){ if (typeof num === "object") return memo+1; else return memo;}, 0));
        var yc = (_.reduce(yetcalled, function(memo, num){ if (typeof num === "object") return memo+1; else return memo;}, 0));
        var cc = (_.reduce(calledin, function(memo, num){ if (typeof num === "object") return memo+1; else return memo;}, 0));
        var total = ac+yc+cc;
        //console.log(template);
        //console.log('#chart_'+that.data.id);
        that.$el.find('#chart_' + that.data.id).highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: 0,
                plotShadow: false
            },
            title: {
                text: '<p style="color: #FFF;font-size: 330%; text-align: center; margin-bottom:0" id="piechart_packages_total">'+total+'</p><p style="color: #9EDD2E;text-align: center">packages</p>',
                align: 'center',
                verticalAlign: 'middle',
                y: -50,
                useHTML: true
            },
            tooltip: {
                enabled: true,
                pointFormat: '<b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    dataLabels: {
                        enabled: true,
                        distance: 20,
                        style: {
                            fontWeight: 'bold',
                            color: 'white',
                            textShadow: '0px 1px 2px black'
                        },
                        formatter: function() {
                            return this.y;
                        }
                    },
                    showInLegend: true,
                    point: {
                        events: {
                            click: function(event) {
                                var options = this.options;
                                if (options.name == "Awarded")
                                    loadPage('procurement/awarded');
                                else if (options.name == "Yet to be called")
                                    loadPage('procurement/yetcalled');
                                else if (options.name == "Called in & In Progress")
                                    loadPage('procurement/called');
                                //console.log(options);

                            },
                            legendItemClick: function(e) {
                                /* To calculate what is the total package shown in pie chart */
                                var pts = e.currentTarget.series.points;
                                var sum = ((!e.currentTarget.visible) ? e.currentTarget.y : 0);
                                for (var i = 0; i < pts.length; i++) {
                                    if (pts[i].name == e.currentTarget.name)
                                        continue;
                                    if (pts[i].visible)
                                        sum += pts[i].y;
                                }
                                $('#piechart_packages_total').text(sum);
                            }
                        }
                    }
                }
            },
            series: [{
                type: 'pie',
                name: '',
                data: [
                    ['Awarded', ac],
                    ['Yet to be called', yc],
                    ['Called in & In Progress', cc]
                ],
                innerSize: '90%'
            }],
            credits: {enabled: false}
        });

    }
})

mpxd.modules.piechart_workpackage.initialize = function(callback) {
    /* Initialize template */

    if (typeof mpxd.modules.piechart_workpackage.initializedFlag == "undefined") {
        mpxd.loadTemplateAsync(["piechartworkpackage"], callback);
        mpxd.modules.piechart_workpackage.initializedFlag = true;
    } else {
        if (typeof callback == "function")
            callback();
    }
}

mpxd.constructors.piechart_workpackage = function(items) {
    mpxd.modules.piechart_workpackage.initialize();
    var el = "#portlet_" + items.id
    return new mpxd.modules.piechart_workpackage.View({data: items, el: el});
}



/**********************************/
/*	
 /*	Procurement barchart
 /*
 /**********************************/

mpxd.modules.barchart_workpackage = {};

mpxd.modules.barchart_workpackage.View = Backbone.View.extend({
    initialize: function(options) {
        this.data = options.data;
        this.render();
    },
    render: function() {
        that = this;
        var html = mpxd.getTemplate("barchartworkpackage");

        template = _.template(html, {data: that.data});
        that.$el.html(template);
        that.$el.find('#chart_' + that.data.id).highcharts({
            chart: {
                type: 'column',
                plotBackgroundColor: null,
                plotBorderWidth: 0,
                plotShadow: false
            },
            title: {
                text: ''
            },
            subtitle: {
                text: ''
            },
            xAxis: {
                labels: {
                    rotation: -45,
                    style: {
                        fontSize: '14px'
                    }
                },
                categories: [
                    'Advanced Work',
                    'Elevated Guideways', //4
                    'Depot', //3
                    'Underground Work', //2
                    'Multistorey Carparks', //7
                    'System', //6
                    'Elevated Stations', //5                    
                    'Civil & Structural and Other Works' //8
                ]
            },
            yAxis: {
                min: 0,
                title: {
                    text: ''
                },
                gridLineColor: 'rgba(255,255,255,0.1)'
            },
            tooltip: {
                headerFormat: '<div style="width:235px"><span style="font-size:16px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0;font-size:13px">{series.name}: </td>' +
                '<td style="padding:0 0 0 20px; color:{series.color}; font-weight:normal">{point.y}</td></tr>',
                footerFormat: '</table></div>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                },
                series: {
                    point: {
                        events: {
                            click: function(e) {
                                var name = e.currentTarget.series.name.toLowerCase();
                                if (name == "awarded")
                                    loadPage('procurement/awarded');
                                else if (name == "yet to be called")
                                    loadPage('procurement/yetcalled');
                                else if (name == "called in & in progress")
                                    loadPage('procurement/called');
                            }
                        }
                    }
                }
            },
            series: [{
                name: 'Total',
                data: [22, 8, 2, 1, 7, 11, 8, 26]

            },	{
                name: 'Awarded',
                data: [22, 8, 2, 1, 6, 11, 8, 19]

            }, {
                name: 'Called in & In Progress',
                data: [0, 0, 0, 0, 0, 0, 0, 3]

            }, {
                name: 'Yet to be called',
                data: [0, 0, 0, 0, 1, 0, 0, 4]

            } ],
            credits: {
                enabled: false
            }
        });

    }
})

mpxd.modules.barchart_workpackage.initialize = function(callback) {
    /* Initialize template */
    if (typeof mpxd.modules.barchart_workpackage.initializedFlag == "undefined") {
        mpxd.loadTemplateAsync(["barchartworkpackage"], callback);
        mpxd.modules.barchart_workpackage.initializedFlag = true;
    } else {
        if (typeof callback == "function")
            callback();
    }
}

mpxd.constructors.barchart_workpackage = function(items) {
    mpxd.modules.barchart_workpackage.initialize();
    var el = "#portlet_" + items.id
    return new mpxd.modules.barchart_workpackage.View({data: items, el: el});
}




/****************************

 GIS Map

 ***************************/

mpxd.constructors.tbm = function(items) {
    console.log(items);
}

/*
 var data_dates = {
 "programme/scurve": "15 October 2014",
 "front/": "",
 "north/index": "17 October 2014",
 "v1/index": "17 October 2014",
 "v2/index": "17 October 2014",
 "v3/index": "17 October 2014",
 "v4/index": "17 October 2014",
 "dpt1/index": "17 October 2014",
 "south/index": "17 October 2014",
 "v5/index": "17 October 2014",
 "v6/index": "17 October 2014",
 "v7/index": "17 October 2014",
 "v8/index": "17 October 2014",
 "dpt2/index": "17 October 2014",
 "ug/index": "20 October 2014",
 "ug/tunnel": "20 October 2014",
 "systems/index": "",
 "procurement/summary": "17 October 2014",
 "procurement/awarded": "17 October 2014",
 "procurement/called": "17 October 2014",
 "procurement/yetcalled": "17 October 2014",
 "kota-damansara/index": "17 October 2014",
 "sungai-buloh/index": "17 October 2014",
 "kampung-selamat/index": "17 October 2014",
 "kwasa-damansara/index": "17 October 2014",
 "kwasa-sentral/index": "17 October 2014",
 "surian/index": "17 October 2014",
 "bandar-utama/index": "17 October 2014",
 "ttdi/index": "17 October 2014",
 "mutiara-damansara/index": "17 October 2014",
 "phileo-damansara/index": "17 October 2014",
 "pusat-bandar-damansara/index": "17 October 2014",
 "semantan/index": "17 October 2014",
 "taman-mutiara/index": "17 October 2014",
 "taman-connaught/index": "17 October 2014",
 "taman-pertama/index": "17 October 2014",
 "taman-midah/index": "17 October 2014",
 "bandar-tun-hussein-onn/index": "17 October 2014",
 "sri-raya/index": "17 October 2014",
 "taman-suntex/index": "17 October 2014",
 "taman-koperasi-cuepacs/index": "17 October 2014",
 "bukit-dukung/index": "17 October 2014",
 "sungai-kantan/index": "17 October 2014",
 "bandar-kajang/index": "17 October 2014",
 "kajang/index": "17 October 2014",
 "v1/gallery": "",
 "v2/gallery": "",
 "v3/gallery": "",
 "v4/gallery": "",
 "v5/gallery": "",
 "v6/gallery": "",
 "v7/gallery": "",
 "v8/gallery": "",
 "dpt1/gallery": "",
 "dpt2/gallery": "",
 "muzium-negara/index": "20 October 2014",
 "pasar-seni/index": "20 October 2014",
 "merdeka/index": "20 October 2014",
 "bukit-bintang/index": "20 October 2014",
 "tun-razak-exchange-trx/index": "20 October 2014",
 "cochrane/index": "20 October 2014",
 "maluri/index": "20 October 2014",
 }*/

/* Set up lookups for easier reference */
var pages_lookup_id = {};
var pages_lookup_url = {};
for (var i = 0; i < pages.length; i++) {
    pages_lookup_id[pages[i].id] = pages[i];
    pages_lookup_url[pages[i].url] = pages[i];
}

function generateBreadcrumbs(id) {
    if (typeof pages_lookup_id[id] == "undefined") {
        console.log("Unable to find page from breadcrumbs!");
        return [];
    }
    var $bc = $('#breadcrumbs');
    var $first = $bc.children('li:first');
    var crumbs = [];
    var page = pages_lookup_id[id];
    var parentid = page.parent;
    var url = page.url;

    crumbs.push('<a href="javascript:void(0);" onclick="loadPage(\'' + url + '\')">' + page.name + '</a>');
    while (parentid != 0) {
        url = pages_lookup_id[parentid].url;
        if(url != '#')
            crumbs.push('<a href="javascript:void(0);" onclick="loadPage(\'' + url + '\')">' + pages_lookup_id[parentid].name + '</a>');
        else
            crumbs.push('<a href="javascript:void(0);" style="cursor:default;color:#B2B2B2">' + pages_lookup_id[parentid].name + '</a>');
        parentid = pages_lookup_id[parentid].parent;
    }
    crumbs = crumbs.reverse();

    var $li = $("<li>" + crumbs.join("</li><li>") + "</li>");

    $bc.empty();

    $bc.append($first).append($li);

    return crumbs;


}



function ellipseTitle(text) {
    /* Not so dynamic, but temporary fix for iPad short width orientation */
    if (($(window).width() <= 768) || true) {
        var $topMenu = $('.menuzord-menu.menuzord-right.menuzord-indented'),
            $pageTitle = $('#page_title'),
            $menuZord = $('#menuzord'),
            defaultMenuWidth = 313,
            menuOuterWidth = (($topMenu.length < 1) ? defaultMenuWidth : $topMenu.outerWidth()), /* If header hasnt load use default */
            zordWidth = $menuZord.width(),
            allowance = zordWidth - menuOuterWidth - parseInt($pageTitle.css('padding-left')) - parseInt($pageTitle.css('padding-right')),
            rlen,
            rtext,
            font = $pageTitle.css('font'),
            bg = $pageTitle.css('background'),
            current = getTextWidth(text, font),
            isExpand = false,
            fexpand = function() {
                $pageTitle.css('background', '#000000');
                $pageTitle.css('border-color', '#000000');
                $pageTitle.text(text);
                isExpand = true;
            },
            fcollapse = function() {
                $pageTitle.css('background', bg);
                $pageTitle.css('border-color', 'transparent');
                $pageTitle.text(rtext);
                isExpand = false;
            },
            ftoggle = function() {
                if (isExpand)
                    fcollapse();
                else
                    fexpand();
            }
        //console.log("current = {0}\n allowence = {1}\n title = {2}\n font = {3}\n zord = {4}\n text = {5}".format(current,allowance,text,font,menuOuterWidth,text));
        if (current > allowance) {
            /* Current text longer than allowed, we try to build the ellipse text */

            for (var i = 0; i < text.length; i++) {
                rtext = text.substring(0, i) + "...";
                rlen = getTextWidth(rtext, font);
                if (rlen > allowance) {
                    rtext = text.substring(0, i - 1) + "...";
                    rlen = getTextWidth(rtext, font);
                    break;
                }
                rtext = text;
                rlen = text.length;
            }
            $pageTitle.text(rtext);
            $pageTitle.on('mouseenter', fexpand).on('mouseleave', fcollapse).on('click', ftoggle);

        } else {
            /* No worries, current is less */
            $pageTitle.text(text);

            /* Reset events */
            $pageTitle.off('mouseenter').off('mouseleave').off('click');
            //console.log('events reset');
        }

    }
}


var currentSlug = "";
var currentPageID = 0;
//var currentPage = "";


/*From: http://stackoverflow.com/questions/13721651/javascript-get-absolute-url-from-relative-escaped-url */
function relativeToAbsolute(url){
    arr = url.split("/") // Cut the url up into a array
    while(!!~arr.indexOf("..")){ // If there still is a ".." in the array
        arr.splice(arr.indexOf("..") - 1, 2); // Remove the ".." and the element before it.
    }
    return arr.join("/"); // Rebuild the url and return it.
}

function loadPage(p, dontsavestate) {
    $("div#loading_pad").removeClass("loading_pad_gohide");
    reallink = p;
    p = p.substr(0, (p.indexOf('?') == -1) ? p.length : p.indexOf('?'));
    //var date = getParameterByName('date');
    $('.megamenu').fadeOut(300);
    if ((typeof p == "undefined") || (p == "") || (p == "#"))
        return;
    if ((typeof dontsavestate != "undefined") && (dontsavestate)) {}
    else {

        /* Cant use '../' in pushState, because it will cause a redundant pushstate to parse to the real url! Need to parse it using script to avoid this */
        var parsedlink = relativeToAbsolute(location.href+ "/../../" + reallink);
        History.pushState({_index: History.getCurrentIndex(), p:reallink, state:"Pushstate"}, document.title, parsedlink);
    }
    //console.log("Pushstate!!");



    //if (
    var currentRoute = p;
    currentPageID = pages_lookup_url[p].id;
    var title = pages_lookup_url[p].name;// + (((typeof data_dates[p] == "undefined") || (data_dates[p] == "")) ? "" : " ("+data_dates[p]+")");
    //$('#data_date').text(((typeof data_dates[p] == "undefined") || (data_dates[p] == "")) ? "" : data_dates[p] );
    generateBreadcrumbs(currentPageID);
    //$('#page_title').text(pages_lookup_url[p].name); // set the page title

    var currentRouteArr = currentRoute.split('/');
    currentSlug = currentRouteArr[0];
    //currentPage = currentRouteArr[1];


    //Get the date list of current slug
    mpxd.getDateList("api/get?date_list=" + currentSlug, function(result){
        var datelist = $("#date_list").empty();
        var curr_data_date = "";
        enableDays = [];

        for(var i=0;i<result.length;i++){
            var date = result[i].date;
            enableDays.push(date);
            if(i==0)
                datelist.append("<li><a href='javascript:void(0)' onClick=loadPage('"+p+"')>"+date+ " (Latest)</a></li>");
            else
                datelist.append("<li><a href='javascript:void(0)' onClick=loadPage('"+p+"?date="+date+"')>"+date+"</a></li>");

            //Update the current date field
            if(getParameterByName("date") === date){
                $("#data_date").val(moment(getParameterByName("date"), "DD-MMM-YY").format("DD-MMMM-YYYY"));
                curr_data_date = date;
            }
        }
        if(getParameterByName("date").length == 0){
            $("#data_date").val(moment(result[0].date, "DD-MMM-YY").format("DD-MMMM-YYYY"));
            curr_data_date = result[0].date;
        }
        //Added by Sebin
        $("#et_data_date").val(curr_data_date);
        //ellipseTitle(title +" ("+ moment(curr_data_date, "DD-MMM-YY").format("DD MMMM YYYY") +")");
        var titletext = title +" ("+ moment(curr_data_date, "DD-MMM-YY").format("DD MMMM YYYY") +")";
        if (!isUseCustomPortlet) { ellipseTitle(titletext); }
        else { $('#page_title').text(titletext); }
        setPageTitle(title);


    });

    mpxd.getportletFromURL(p, function(data) {
        //$('#portlet_container').empty();
				
		//Draw the portlets
        drawPortlets(data);
        mpxd.getData(data, function(result) {
            mpxd.resetDatasource();
            for (var i in result.data) {
                //var json = jQuery.parseJSON(result.data[i].value);
                //var name = data[i].name;
                mpxd.storeDatasourceToArray(result.data[i], (typeof result.static_data[i] == "undefined") ? "[]" : result.static_data[i]);
                //temp.push(json);
                //console.log(result.data[i].value);
            }
            //console.log(result);
            var array = mpxd.generatePortletContent(result.item);
            var temp = [];
            $("div#loading_pad").addClass("loading_pad_gohide");
            //mpxd.datasource = temp;
        });
    });
}

function enableAllTheseDays(date) {
    var sdate = $.datepicker.formatDate( 'dd-M-y', date)
    //console.log(sdate)
    if($.inArray(sdate, enableDays) != -1) {
        return [true];
    }
    return [false];
}

function getRoute() {
    var l = location.href;
    var find = "/mpxd/";
    var start = l.indexOf(find);

    var currentRoute = l.substr(start + find.length);
    var currentRoute = currentRoute.substr(0, (currentRoute.indexOf('#') == -1) ? currentRoute.length : currentRoute.indexOf('#'));
    return currentRoute;
}

$(function() {
	console.log("Fire!")
	setTimeout(function(){console.log("Timeout");$(window).trigger("resize");},2000);
	var State = History.getState()
	
	//History.log('initial:', State.data, State.title, State.url);

	// Bind to State Change
	History.Adapter.bind(window,'statechange',function(){ // Note: We are using statechange instead of popstate
		// Log the State
		var State = History.getState(); // Note: We are using History.getState() instead of event.state
		//History.log('statechange:', State.data, State.title, State.url);
		/* Using the fix from https://github.com/browserstate/history.js/issues/47#issuecomment-25750285 for popstate on pushstate state call*/
		var currentIndex = History.getCurrentIndex();
		var internal = (History.getState().data._index == (currentIndex - 1));
		if (!internal) {
			if ((typeof State.data.state != "undefined") && (State.data.state == "Pushstate")) { if (typeof State.data.p != "undefined") { loadPage(State.data.p, true);}};
			// your action
		}
		
		//console.log(State);
	});

	
	$('#data_date').datepicker({
	dateFormat: 'dd-MM-yy', beforeShowDay: enableAllTheseDays, nextText: "", prevText: "", altField : '#data_date_selected', altFormat: "dd-M-y",
	onSelect: function(dateText, inst) {
			p = reallink.substr(0, (reallink.indexOf('?') == -1) ? reallink.length : reallink.indexOf('?'));
			var selected = $('#data_date_selected').val();
			loadPage(p+'?date='+selected)

		}
	});
	
	$('#date_selector').on('click', function() {
		$('#data_date').datepicker("show");
	})
});





/* Utility functions */


function getTextWidth(text, font) {
    // re-use canvas object for better performance
    var canvas = getTextWidth.canvas || (getTextWidth.canvas = document.createElement("canvas"));
    var context = canvas.getContext("2d");
    context.font = font;
    var metrics = context.measureText(text);
    return metrics.width;
}
;

function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
        results = regex.exec(location.search);
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}

function monthDiff(d1, d2) {
    var months;
    months = (d2.getFullYear() - d1.getFullYear()) * 12;
    months -= d1.getMonth() + 1;
    months += d2.getMonth();
    return months <= 0 ? 0 : months;
}