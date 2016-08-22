/*Created : Sebin Thomas
For     : Backbone Constructors, Views and the associated functions
Date    : 14/07/2016*/

mpxd.constructors.page_info_ring = function(data) {
    mpxd.modules.general.GenerateGeneralview(data);
}
mpxd.constructors.progress_alt = function(data) {
    var el = "#portlet_" + data.id;
    if (typeof callback == "undefined") callback = function(){};
    return new mpxd.modules.track_works.progress({data: data, el: el, callback: callback});
}
mpxd.constructors.it_cs_stations = function(data) {
    mpxd.modules.general.GenerateGeneralview(data);
}
mpxd.constructors.trip_cable_progress = function(data) {
    mpxd.modules.general.GenerateGeneralview(data);
}
mpxd.constructors.region_progress = function(data) {
    mpxd.modules.general.GenerateGeneralview(data);
}
mpxd.constructors.overall_progress = function(data) {
    mpxd.modules.general.GenerateGeneralview(data);
}
mpxd.constructors.chainage_progress = function(data) {
    mpxd.modules.general.GenerateGeneralview(data);
}
mpxd.constructors.area_progress = function(data) {
    mpxd.modules.general.GenerateGeneralview(data);
}
mpxd.constructors.station_tracklist = function(data,callback) {
    var el = "#portlet_" + data.id;
    if (typeof callback == "undefined") callback = function(){};
    return new mpxd.modules.track_works.station_list({data: data, el: el, callback: callback});
}
mpxd.constructors.overall_progress_chart = function (data) {
    var el = "#portlet_" + data.id;
    return new mpxd.modules.track_works.overall_progress({data: data, el: el});
}
mpxd.constructors.trainborne = function (data) {
    var el = "#portlet_" + data.id;
    return new mpxd.modules.signal_train_control_system.detail_progress({data: data, el: el});
}
mpxd.constructors.stcs_map = function (data) {
    var el = "#portlet_" + data.id;
    return new mpxd.modules.signal_train_control_system.map({data: data, el: el});
}
mpxd.constructors.stcs_map_bg = function (data) {
    var el = "#portlet_" + data.id;
    return new mpxd.modules.signal_train_control_system.map_bg({data: data, el: el});
}
mpxd.constructors.trainborne_overall_et = function (data) {
    var el = "#portlet_" + data.id;
    return new mpxd.modules.signal_train_control_system.overall_progress({data: data, el: el});
}
mpxd.modules.track_works = {}
mpxd.modules.signal_train_control_system = {}
mpxd.modules.track_works.overall_progress = Backbone.View.extend({
    initialize: function (options) {
        this.data = options.data;
        this.render();
    },render: function () {
        var that = this;
        var html = mpxd.getTemplate(that.data.type);
        template = _.template(html, {data: that.data});

        that.$el.html(template);
        that.$el.find('.content').mCustomScrollbar({theme: 'rounded'});
        that.$el.find('.progress-chart-2').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: ''
            },
            subtitle: {
                text: 'Overall '+that.data.data[1].data['region']
            },
            xAxis: {
                categories: that.data.data[1].data['category'],
                crosshair: true,
                labels: {
                    rotation: -45
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Total Work'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y} </b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                },dataLabels: {
                    enabled: false,
                    color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white',
                    style: {
                        textShadow: '0 0 3px grey'
                    }
                }

            },
            series: [{
                name: 'Planned',
                data: that.data.data[1].data['planned']

            }, {
                name: 'Actual',
                data: that.data.data[1].data['actual']
            }]
        });
    }

});
mpxd.modules.track_works.station_list = Backbone.View.extend({
    initialize: function (options) {
        this.data = options.data;
        this.render();
        if (typeof options.callback == "function") options.callback(this.data);
    },render: function () {
        var that = this;
        var html = mpxd.getTemplate(that.data.type);
        template = _.template(html, {data: that.data});
        that.$el.html(template);
        that.$el.find('.content').mCustomScrollbar({theme: 'rounded'});

        // From Here
        //Author: Naim
        //Date  : 20/07/2016
        var json = [ //please sort this by 'item_id'
            {"item_group":"n","item_type":"st","item_id":"NST01","item_status":"1","item_name":"Sungai Buloh"},
            {"item_group":"n","item_type":"st","item_id":"NST02","item_status":"1","item_name":"Kg. Selamat"},
            {"item_group":"n","item_type":"st","item_id":"NST03","item_status":"1","item_name":"Kwasa Damansara"},
            {"item_group":"n","item_type":"st","item_id":"NST04","item_status":"0","item_name":"Kwasa Sentral"},
            {"item_group":"n","item_type":"st","item_id":"NST05","item_status":"1","item_name":"Kota Damansara"},
            {"item_group":"n","item_type":"st","item_id":"NST06","item_status":"2","item_name":"Surian"},
            {"item_group":"n","item_type":"st","item_id":"NST07","item_status":"3","item_name":"Mutiara Damansara"},
            {"item_group":"n","item_type":"st","item_id":"NST08","item_status":"1","item_name":"Bandar Utama"},
            {"item_group":"n","item_type":"st","item_id":"NST09","item_status":"1","item_name":"TTDI"},
            {"item_group":"n","item_type":"st","item_id":"NST10","item_status":"1","item_name":"Phileo Damansara"},
            {"item_group":"n","item_type":"st","item_id":"NST11","item_status":"1","item_name":"Pusat Bandar Damansara"},
            {"item_group":"n","item_type":"st","item_id":"NST12","item_status":"1","item_name":"Semantan"},

            {"item_group":"u","item_type":"st","item_id":"UST01","item_status":"1","item_name":"Muzium Negara"},
            {"item_group":"u","item_type":"st","item_id":"UST02","item_status":"1","item_name":"Pasar Seni"},
            {"item_group":"u","item_type":"st","item_id":"UST03","item_status":"1","item_name":"Merdeka"},
            {"item_group":"u","item_type":"st","item_id":"UST04","item_status":"0","item_name":"Bukit Bintang"},
            {"item_group":"u","item_type":"st","item_id":"UST05","item_status":"1","item_name":"Tun Razak Exchange"},
            {"item_group":"u","item_type":"st","item_id":"UST06","item_status":"2","item_name":"Cochrane"},
            {"item_group":"u","item_type":"st","item_id":"UST07","item_status":"3","item_name":"Maluri"},

            {"item_group":"s","item_type":"st","item_id":"SST01","item_status":"1","item_name":"Taman Pertama"},
            {"item_group":"s","item_type":"st","item_id":"SST02","item_status":"1","item_name":"Taman Midah"},
            {"item_group":"s","item_type":"st","item_id":"SST03","item_status":"0","item_name":"Taman Mutiara"},
            {"item_group":"s","item_type":"st","item_id":"SST04","item_status":"1","item_name":"Taman Connaught"},
            {"item_group":"s","item_type":"st","item_id":"SST05","item_status":"2","item_name":"Taman Suntex"},
            {"item_group":"s","item_type":"st","item_id":"SST06","item_status":"3","item_name":"Sri Raya"},
            {"item_group":"s","item_type":"st","item_id":"SST07","item_status":"1","item_name":"Bandar Tun Hussein Onn"},
            {"item_group":"s","item_type":"st","item_id":"SST08","item_status":"1","item_name":"Bukit Dukung"},
            {"item_group":"s","item_type":"st","item_id":"SST09","item_status":"1","item_name":"Taman Koperasi Cuepacs"},
            {"item_group":"s","item_type":"st","item_id":"SST10","item_status":"1","item_name":"Sungai Kantan"},
            {"item_group":"s","item_type":"st","item_id":"SST11","item_status":"1","item_name":"Bandar Kajang"},
            {"item_group":"s","item_type":"st","item_id":"SST12","item_status":"1","item_name":"Kajang"},

            {"item_group":"n","item_type":"dp","item_id":"DP01","item_status":"3","item_name":"Sungai Buloh"},
            {"item_group":"s","item_type":"dp","item_id":"DP02","item_status":"2","item_name":"Kajang"},

            {"item_group":"n","item_type":"sttr","item_id":"STTR_NST01","item_status":"0L","item_name":""},
            {"item_group":"n","item_type":"sttr","item_id":"STTR_NST01","item_status":"1R","item_name":""},
            {"item_group":"n","item_type":"sttr","item_id":"STTR_NST02","item_status":"2L","item_name":""},
            {"item_group":"n","item_type":"sttr","item_id":"STTR_NST02","item_status":"3R","item_name":""},
            {"item_group":"n","item_type":"sttr","item_id":"STTR_NST03","item_status":"0L","item_name":""},
            {"item_group":"n","item_type":"sttr","item_id":"STTR_NST03","item_status":"1R","item_name":""},
            {"item_group":"n","item_type":"sttr","item_id":"STTR_NST04","item_status":"2L","item_name":""},
            {"item_group":"n","item_type":"sttr","item_id":"STTR_NST04","item_status":"3R","item_name":""},
            {"item_group":"n","item_type":"sttr","item_id":"STTR_NST05","item_status":"0L","item_name":""},
            {"item_group":"n","item_type":"sttr","item_id":"STTR_NST05","item_status":"1R","item_name":""},
            {"item_group":"n","item_type":"sttr","item_id":"STTR_NST06","item_status":"2L","item_name":""},
            {"item_group":"n","item_type":"sttr","item_id":"STTR_NST06","item_status":"3R","item_name":""},
            {"item_group":"n","item_type":"sttr","item_id":"STTR_NST07","item_status":"0L","item_name":""},
            {"item_group":"n","item_type":"sttr","item_id":"STTR_NST07","item_status":"1R","item_name":""},
            {"item_group":"n","item_type":"sttr","item_id":"STTR_NST08","item_status":"2L","item_name":""},
            {"item_group":"n","item_type":"sttr","item_id":"STTR_NST08","item_status":"3R","item_name":""},
            {"item_group":"n","item_type":"sttr","item_id":"STTR_NST09","item_status":"0L","item_name":""},
            {"item_group":"n","item_type":"sttr","item_id":"STTR_NST09","item_status":"1R","item_name":""},
            {"item_group":"n","item_type":"sttr","item_id":"STTR_NST10","item_status":"2L","item_name":""},
            {"item_group":"n","item_type":"sttr","item_id":"STTR_NST10","item_status":"3R","item_name":""},
            {"item_group":"n","item_type":"sttr","item_id":"STTR_NST11","item_status":"0L","item_name":""},
            {"item_group":"n","item_type":"sttr","item_id":"STTR_NST11","item_status":"1R","item_name":""},
            {"item_group":"n","item_type":"sttr","item_id":"STTR_NST12","item_status":"2L","item_name":""},
            {"item_group":"n","item_type":"sttr","item_id":"STTR_NST12","item_status":"3R","item_name":""},

            {"item_group":"u","item_type":"sttr","item_id":"STTR_UST01","item_status":"0L","item_name":""},
            {"item_group":"u","item_type":"sttr","item_id":"STTR_UST01","item_status":"1R","item_name":""},
            {"item_group":"u","item_type":"sttr","item_id":"STTR_UST02","item_status":"2L","item_name":""},
            {"item_group":"u","item_type":"sttr","item_id":"STTR_UST02","item_status":"3R","item_name":""},
            {"item_group":"u","item_type":"sttr","item_id":"STTR_UST03","item_status":"0L","item_name":""},
            {"item_group":"u","item_type":"sttr","item_id":"STTR_UST03","item_status":"1R","item_name":""},
            {"item_group":"u","item_type":"sttr","item_id":"STTR_UST04","item_status":"2L","item_name":""},
            {"item_group":"u","item_type":"sttr","item_id":"STTR_UST04","item_status":"3R","item_name":""},
            {"item_group":"u","item_type":"sttr","item_id":"STTR_UST05","item_status":"0L","item_name":""},
            {"item_group":"u","item_type":"sttr","item_id":"STTR_UST05","item_status":"1R","item_name":""},
            {"item_group":"u","item_type":"sttr","item_id":"STTR_UST06","item_status":"2L","item_name":""},
            {"item_group":"u","item_type":"sttr","item_id":"STTR_UST06","item_status":"3R","item_name":""},
            {"item_group":"u","item_type":"sttr","item_id":"STTR_UST07","item_status":"0L","item_name":""},
            {"item_group":"u","item_type":"sttr","item_id":"STTR_UST07","item_status":"1R","item_name":""},

            {"item_group":"s","item_type":"sttr","item_id":"STTR_SST01","item_status":"0L","item_name":""},
            {"item_group":"s","item_type":"sttr","item_id":"STTR_SST01","item_status":"1R","item_name":""},
            {"item_group":"s","item_type":"sttr","item_id":"STTR_SST02","item_status":"2L","item_name":""},
            {"item_group":"s","item_type":"sttr","item_id":"STTR_SST02","item_status":"3R","item_name":""},
            {"item_group":"s","item_type":"sttr","item_id":"STTR_SST03","item_status":"0L","item_name":""},
            {"item_group":"s","item_type":"sttr","item_id":"STTR_SST03","item_status":"1R","item_name":""},
            {"item_group":"s","item_type":"sttr","item_id":"STTR_SST04","item_status":"2L","item_name":""},
            {"item_group":"s","item_type":"sttr","item_id":"STTR_SST04","item_status":"3R","item_name":""},
            {"item_group":"s","item_type":"sttr","item_id":"STTR_SST05","item_status":"0L","item_name":""},
            {"item_group":"s","item_type":"sttr","item_id":"STTR_SST05","item_status":"1R","item_name":""},
            {"item_group":"s","item_type":"sttr","item_id":"STTR_SST06","item_status":"2L","item_name":""},
            {"item_group":"s","item_type":"sttr","item_id":"STTR_SST06","item_status":"3R","item_name":""},
            {"item_group":"s","item_type":"sttr","item_id":"STTR_SST07","item_status":"0L","item_name":""},
            {"item_group":"s","item_type":"sttr","item_id":"STTR_SST07","item_status":"1R","item_name":""},
            {"item_group":"s","item_type":"sttr","item_id":"STTR_SST08","item_status":"2L","item_name":""},
            {"item_group":"s","item_type":"sttr","item_id":"STTR_SST08","item_status":"3R","item_name":""},
            {"item_group":"s","item_type":"sttr","item_id":"STTR_SST09","item_status":"0L","item_name":""},
            {"item_group":"s","item_type":"sttr","item_id":"STTR_SST09","item_status":"1R","item_name":""},
            {"item_group":"s","item_type":"sttr","item_id":"STTR_SST10","item_status":"2L","item_name":""},
            {"item_group":"s","item_type":"sttr","item_id":"STTR_SST10","item_status":"3R","item_name":""},
            {"item_group":"s","item_type":"sttr","item_id":"STTR_SST11","item_status":"0L","item_name":""},
            {"item_group":"s","item_type":"sttr","item_id":"STTR_SST11","item_status":"1R","item_name":""},
            {"item_group":"s","item_type":"sttr","item_id":"STTR_SST12","item_status":"2L","item_name":""},
            {"item_group":"s","item_type":"sttr","item_id":"STTR_SST12","item_status":"3R","item_name":""},

            {"item_group":"n","item_type":"sttrdp","item_id":"STTR_DP01","item_status":"1","item_name":"Sungai Buloh"},
            {"item_group":"s","item_type":"sttrdp","item_id":"STTR_DP02","item_status":"3","item_name":"Kajang"}
        ];

        /*status color*/
        tw_elem_status_0 = '#2b908f';
        tw_elem_status_1 = '#2b908f';
        tw_elem_status_2 = '#2b908f';
        tw_elem_status_3 = '#2b908f';

        /*alignment*/
        tw_elem_n_station_cube = '37%';
        tw_elem_u_station_cube = '37%';
        tw_elem_s_station_cube = '37%';


        for (i = 0; i < json.length; i++) {
            var b = json[i];
            tw_item_group = b.item_group;
            tw_item_type = b.item_type;
            tw_item_id = b.item_id;
            tw_item_status = b.item_status;
            tw_item_name = b.item_name;

            /*element station*/
            tw_el_st_n_1 = '<div id="'+tw_item_id+'" class="col-xs-1 col-sm-1 col-md-1"><span class="sg_a_title">'+tw_item_name+'</span><span class="sg_a_station" style="background:';
            tw_el_st_n_2 = '!important;left:'+tw_elem_n_station_cube+'!important"></span></div>';
            tw_el_st_u_1 = '<div id="'+tw_item_id+'" class="col-xs-1 col-sm-1 col-md-1"><span class="sg_a_title">'+tw_item_name+'</span><span class="sg_a_station" style="background:';
            tw_el_st_u_2 = '!important;left:'+tw_elem_u_station_cube+'!important"></span></div>';
            tw_el_st_s_1 = '<div id="'+tw_item_id+'" class="col-xs-1 col-sm-1 col-md-1"><span class="sg_a_title">'+tw_item_name+'</span><span class="sg_a_station" style="background:';
            tw_el_st_s_2 = '!important;left:'+tw_elem_s_station_cube+'!important"></span></div>';

            /*element station track*/
            tw_el_sttr_1L = '<div id="STTR_'+tw_item_id+'"class="col-xs-1 col-sm-1 col-md-1"><div class="row"><div class="col-xs-6 col-sm-6 col-md-6 tw_elem_status_L"';
            tw_el_sttr_2L = ';"></div>';
            tw_el_sttr_1R = '<div class="col-xs-6 col-sm-6 col-md-6 tw_elem_status_R"';
            tw_el_sttr_2R = ';"></div></div></div>';
            tw_el_sttr_set = tw_el_sttr_1L+tw_el_sttr_2L+tw_el_sttr_1R+tw_el_sttr_2R;



            if (tw_item_group == 'n') {
                if (tw_item_type == 'st') {
                    if (tw_item_status == '0') {
                        append_station = tw_el_st_n_1+tw_elem_status_0+tw_el_st_n_2;
                        that.$el.find('#nsg_station').append(append_station);
                        that.$el.find('#nsg_station_bar').append(tw_el_sttr_set);
                    } else if (tw_item_status == '1') {
                        append_station = tw_el_st_n_1+tw_elem_status_1+tw_el_st_n_2;
                        that.$el.find('#nsg_station').append(append_station);
                        that.$el.find('#nsg_station_bar').append(tw_el_sttr_set);
                    } else if (tw_item_status == '2') {
                        append_station = tw_el_st_n_1+tw_elem_status_2+tw_el_st_n_2;
                        that.$el.find('#nsg_station').append(append_station);
                        that.$el.find('#nsg_station_bar').append(tw_el_sttr_set);
                    } else if (tw_item_status == '3') {
                        append_station = tw_el_st_n_1+tw_elem_status_3+tw_el_st_n_2;
                        that.$el.find('#nsg_station').append(append_station);
                        that.$el.find('#nsg_station_bar').append(tw_el_sttr_set);
                    }
                }
            } else if (tw_item_group == 'u') {
                if (tw_item_type == 'st') {
                    if (tw_item_status == '0') {
                        append_station = tw_el_st_u_1+tw_elem_status_0+tw_el_st_u_2;
                        that.$el.find('#usg_station').append(append_station);
                        that.$el.find('#usg_station_bar').append(tw_el_sttr_set);
                    } else if (tw_item_status == '1') {
                        append_station = tw_el_st_u_1+tw_elem_status_1+tw_el_st_u_2;
                        that.$el.find('#usg_station').append(append_station);
                        that.$el.find('#usg_station_bar').append(tw_el_sttr_set);
                    } else if (tw_item_status == '2') {
                        append_station = tw_el_st_u_1+tw_elem_status_2+tw_el_st_u_2;
                        that.$el.find('#usg_station').append(append_station);
                        that.$el.find('#usg_station_bar').append(tw_el_sttr_set);
                    } else if (tw_item_status == '3') {
                        append_station = tw_el_st_u_1+tw_elem_status_3+tw_el_st_u_2;
                        that.$el.find('#usg_station').append(append_station);
                        that.$el.find('#usg_station_bar').append(tw_el_sttr_set);
                    }
                }
            } else if (tw_item_group == 's') {
                if (tw_item_type == 'st') {
                    if (tw_item_status == '0') {
                        append_station = tw_el_st_s_1+tw_elem_status_0+tw_el_st_s_2;
                        that.$el.find('#ssg_station').append(append_station);
                        that.$el.find('#ssg_station_bar').append(tw_el_sttr_set);
                    } else if (tw_item_status == '1') {
                        append_station = tw_el_st_s_1+tw_elem_status_1+tw_el_st_s_2;
                        that.$el.find('#ssg_station').append(append_station);
                        that.$el.find('#ssg_station_bar').append(tw_el_sttr_set);
                    } else if (tw_item_status == '2') {
                        append_station = tw_el_st_s_1+tw_elem_status_2+tw_el_st_s_2;
                        that.$el.find('#ssg_station').append(append_station);
                        that.$el.find('#ssg_station_bar').append(tw_el_sttr_set);
                    } else if (tw_item_status == '3') {
                        append_station = tw_el_st_s_1+tw_elem_status_3+tw_el_st_s_2;
                        that.$el.find('#ssg_station').append(append_station);
                        that.$el.find('#ssg_station_bar').append(tw_el_sttr_set);
                    }
                }
            }
        }

        for (i = 0; i < json.length; i++) {
            var b = json[i];
            tw_item_group = b.item_group;
            tw_item_type = b.item_type;
            tw_item_id = b.item_id;
            tw_item_status = b.item_status;
            tw_item_name = b.item_name;

            if (tw_item_group == 'n') {
                if (tw_item_type == 'sttrdp') {
                    tw_el_dp_n1 = '<div class="sg_bar_b_n"></div>';
                    that.$el.find('#nsg_depot_bar').append(tw_el_dp_n1);
                } else if (tw_item_type == 'dp') {
                    if (tw_item_status == '0') {
                        tw_el_dp_n2_sub = '<span class="sg_b_depot" style="background:'+tw_elem_status_0+'"></span>';
                    } else if (tw_item_status == '1') {
                        tw_el_dp_n2_sub = '<span class="sg_b_depot" style="background:'+tw_elem_status_1+'"></span>';
                    } else if (tw_item_status == '2') {
                        tw_el_dp_n2_sub = '<span class="sg_b_depot" style="background:'+tw_elem_status_2+'"></span>';
                    } else if (tw_item_status == '3') {
                        tw_el_dp_n2_sub = '<span class="sg_b_depot" style="background:'+tw_elem_status_3+'"></span>';
                    }
                    tw_el_dp_n2 = '<div class="sg_b_depot_plate_n">'+tw_el_dp_n2_sub+'<span class="sg_b_title_n">'+tw_item_name+'</span></div>';
                    that.$el.find('#nsg_depot').append(tw_el_dp_n2);
                }
            } else if (tw_item_group == 's') {
                if (tw_item_type == 'sttrdp') {
                    tw_el_dp_s1 = '<div class="sg_bar_b_s"></div>';
                    that.$el.find('#ssg_depot_bar').append(tw_el_dp_s1);
                } else if (tw_item_type == 'dp') {
                    if (tw_item_status == '0') {
                        tw_el_dp_s2_sub = '<span class="sg_b_depot" style="background:'+tw_elem_status_0+'"></span>';
                    } else if (tw_item_status == '1') {
                        tw_el_dp_s2_sub = '<span class="sg_b_depot" style="background:'+tw_elem_status_1+'"></span>';
                    } else if (tw_item_status == '2') {
                        tw_el_dp_s2_sub = '<span class="sg_b_depot" style="background:'+tw_elem_status_2+'"></span>';
                    } else if (tw_item_status == '3') {
                        tw_el_dp_s2_sub = '<span class="sg_b_depot" style="background:'+tw_elem_status_3+'"></span>';
                    }
                    tw_el_dp_s2 = '<div class="sg_b_depot_plate_s">'+tw_el_dp_s2_sub+'<span class="sg_b_title_s">'+tw_item_name+'</span></div>';
                    that.$el.find('#ssg_depot').append(tw_el_dp_s2);
                }
            }
        }

        for (i = 0; i < json.length; i++) {
            var b = json[i];
            tw_item_group = b.item_group;
            tw_item_type = b.item_type;
            tw_item_id = b.item_id;
            tw_item_status = b.item_status;
            tw_item_name = b.item_name;

            if (tw_item_group == 'n') {
                if (tw_item_type == 'sttr') {
                    if (tw_item_status == '0L') {
                        that.$el.find('#nsg_station_bar #'+tw_item_id+' div.tw_elem_status_L').attr('style','border-bottom:4px solid '+tw_elem_status_0+';');
                    } else if (tw_item_status == '1L') {
                        that.$el.find('#nsg_station_bar #'+tw_item_id+' div.tw_elem_status_L').attr('style','border-bottom:4px solid '+tw_elem_status_1+';');
                    } else if (tw_item_status == '2L') {
                        that.$el.find('#nsg_station_bar #'+tw_item_id+' div.tw_elem_status_L').attr('style','border-bottom:4px solid '+tw_elem_status_2+';');
                    } else if (tw_item_status == '3L') {
                        that.$el.find('#nsg_station_bar #'+tw_item_id+' div.tw_elem_status_L').attr('style','border-bottom:4px solid '+tw_elem_status_3+';');
                    } else if (tw_item_status == '0R') {
                        that.$el.find('#nsg_station_bar #'+tw_item_id+' div.tw_elem_status_R').attr('style','border-bottom:4px solid '+tw_elem_status_0+';');
                    } else if (tw_item_status == '1R') {
                        that.$el.find('#nsg_station_bar #'+tw_item_id+' div.tw_elem_status_R').attr('style','border-bottom:4px solid '+tw_elem_status_1+';');
                    } else if (tw_item_status == '2R') {
                        that.$el.find('#nsg_station_bar #'+tw_item_id+' div.tw_elem_status_R').attr('style','border-bottom:4px solid '+tw_elem_status_2+';');
                    } else if (tw_item_status == '3R') {
                        that.$el.find('#nsg_station_bar #'+tw_item_id+' div.tw_elem_status_R').attr('style','border-bottom:4px solid '+tw_elem_status_3+';');
                    }
                } else if (tw_item_type == 'sttrdp') {
                    if (tw_item_status == '0') {
                        that.$el.find('div.sg_bar_b_n').attr('style','border-right:4px solid '+tw_elem_status_0+';border-bottom:4px solid '+tw_elem_status_0+';');
                    } else if (tw_item_status == '1') {
                        that.$el.find('div.sg_bar_b_n').attr('style','border-right:4px solid '+tw_elem_status_1+';border-bottom:4px solid '+tw_elem_status_1+';');
                    } else if (tw_item_status == '2') {
                        that.$el.find('div.sg_bar_b_n').attr('style','border-right:4px solid '+tw_elem_status_2+';border-bottom:4px solid '+tw_elem_status_2+';');
                    } else if (tw_item_status == '3') {
                        that.$el.find('div.sg_bar_b_n').attr('style','border-right:4px solid '+tw_elem_status_3+';border-bottom:4px solid '+tw_elem_status_3+';');
                    }
                }
            } else if (tw_item_group == 'u') {
                if (tw_item_type == 'sttr') {
                    if (tw_item_status == '0L') {
                        that.$el.find('#usg_station_bar #'+tw_item_id+' div.tw_elem_status_L').attr('style','border-bottom:4px solid '+tw_elem_status_0+';');
                    } else if (tw_item_status == '1L') {
                        that.$el.find('#usg_station_bar #'+tw_item_id+' div.tw_elem_status_L').attr('style','border-bottom:4px solid '+tw_elem_status_1+';');
                    } else if (tw_item_status == '2L') {
                        that.$el.find('#usg_station_bar #'+tw_item_id+' div.tw_elem_status_L').attr('style','border-bottom:4px solid '+tw_elem_status_2+';');
                    } else if (tw_item_status == '3L') {
                        that.$el.find('#usg_station_bar #'+tw_item_id+' div.tw_elem_status_L').attr('style','border-bottom:4px solid '+tw_elem_status_3+';');
                    } else if (tw_item_status == '0R') {
                        that.$el.find('#usg_station_bar #'+tw_item_id+' div.tw_elem_status_R').attr('style','border-bottom:4px solid '+tw_elem_status_0+';');
                    } else if (tw_item_status == '1R') {
                        that.$el.find('#usg_station_bar #'+tw_item_id+' div.tw_elem_status_R').attr('style','border-bottom:4px solid '+tw_elem_status_1+';');
                    } else if (tw_item_status == '2R') {
                        that.$el.find('#usg_station_bar #'+tw_item_id+' div.tw_elem_status_R').attr('style','border-bottom:4px solid '+tw_elem_status_2+';');
                    } else if (tw_item_status == '3R') {
                        that.$el.find('#usg_station_bar #'+tw_item_id+' div.tw_elem_status_R').attr('style','border-bottom:4px solid '+tw_elem_status_3+';');
                    }
                }
            } else if (tw_item_group == 's') {
                if (tw_item_type == 'sttr') {
                    if (tw_item_status == '0L') {
                        that.$el.find('#ssg_station_bar #'+tw_item_id+' div.tw_elem_status_L').attr('style','border-bottom:4px solid '+tw_elem_status_0+';');
                    } else if (tw_item_status == '1L') {
                        that.$el.find('#ssg_station_bar #'+tw_item_id+' div.tw_elem_status_L').attr('style','border-bottom:4px solid '+tw_elem_status_1+';');
                    } else if (tw_item_status == '2L') {
                        that.$el.find('#ssg_station_bar #'+tw_item_id+' div.tw_elem_status_L').attr('style','border-bottom:4px solid '+tw_elem_status_2+';');
                    } else if (tw_item_status == '3L') {
                        that.$el.find('#ssg_station_bar #'+tw_item_id+' div.tw_elem_status_L').attr('style','border-bottom:4px solid '+tw_elem_status_3+';');
                    } else if (tw_item_status == '0R') {
                        that.$el.find('#ssg_station_bar #'+tw_item_id+' div.tw_elem_status_R').attr('style','border-bottom:4px solid '+tw_elem_status_0+';');
                    } else if (tw_item_status == '1R') {
                        that.$el.find('#ssg_station_bar #'+tw_item_id+' div.tw_elem_status_R').attr('style','border-bottom:4px solid '+tw_elem_status_1+';');
                    } else if (tw_item_status == '2R') {
                        that.$el.find('#ssg_station_bar #'+tw_item_id+' div.tw_elem_status_R').attr('style','border-bottom:4px solid '+tw_elem_status_2+';');
                    } else if (tw_item_status == '3R') {
                        that.$el.find('#ssg_station_bar #'+tw_item_id+' div.tw_elem_status_R').attr('style','border-bottom:4px solid '+tw_elem_status_3+';');
                    }
                } else if (tw_item_type == 'sttrdp') {
                    if (tw_item_status == '0') {
                        that.$el.find('div.sg_bar_b_s').attr('style','border-left:4px solid '+tw_elem_status_0+';border-bottom:4px solid '+tw_elem_status_0+';');
                    } else if (tw_item_status == '1') {
                        that.$el.find('div.sg_bar_b_s').attr('style','border-left:4px solid '+tw_elem_status_1+';border-bottom:4px solid '+tw_elem_status_1+';');
                    } else if (tw_item_status == '2') {
                        that.$el.find('div.sg_bar_b_s').attr('style','border-left:4px solid '+tw_elem_status_2+';border-bottom:4px solid '+tw_elem_status_2+';');
                    } else if (tw_item_status == '3') {
                        that.$el.find('div.sg_bar_b_s').attr('style','border-left:4px solid '+tw_elem_status_3+';border-bottom:4px solid '+tw_elem_status_3+';');
                    }
                }
            }
        }
        //Upto Here
    }
});
mpxd.modules.signal_train_control_system.detail_progress = Backbone.View.extend({
    initialize: function (options) {
        this.data = options.data;
        this.render();
    },render: function () {
        var that = this;
        var html = mpxd.getTemplate(that.data.type);
        template = _.template(html, {data: that.data});
        that.$el.html(template);
        that.$el.find('.content').mCustomScrollbar({theme: 'rounded'});

        var d = $.Deferred();
        var y = ['rgb(255, 221, 32)','rgb(240, 178, 15)'];
        var g = ['rgb(77, 180, 77)','green'];
        var r = ['rgb(255, 56, 32)','rgb(255, 17, 8)'];
        d3.xml("/mpxd/assets/img/systems/stcs/mrt_train_diagram_3.svg", "image/svg+xml", function (error, xml) {

            if (error) throw console.log("error")
            document.getElementById('tc1').appendChild(xml.documentElement);
            var a = document.getElementById('svg4265');
            var overall=parseFloat((parseFloat(that.data.data[1].data[0]['overall'])+parseFloat(that.data.data[1].data[0]['static'])+parseFloat(that.data.data[1].data[0]['dynamic']))/Object.keys(that.data.data[1].data[0]).length).toFixed(2);
            if(overall==100) {
                d3.select("#path4836").style("fill", g[0]);
                d3.select("#path5007").style("fill", g[1]);
                d3.select("#path5009").style("fill", g[1]);
                d3.select("#path4981").style("fill", g[1]);
            }else if(overall >=1){
                d3.select("#path4836").style("fill", y[0]);
                d3.select("#path5007").style("fill", y[1]);
                d3.select("#path5009").style("fill", y[1]);
                d3.select("#path4981").style("fill", y[1]);
            }else{
                d3.select("#path4836").style("fill", r[0]);
                d3.select("#path5007").style("fill", r[1]);
                d3.select("#path5009").style("fill", r[1]);
                d3.select("#path4981").style("fill", r[1]);
            }
        });
    }
});
mpxd.modules.signal_train_control_system.map = Backbone.View.extend({
    initialize: function (options) {
        this.data = options.data;
        this.render();
    },render: function () {
        var that = this;
        var html = mpxd.getTemplate(that.data.type);
        template = _.template(html, {data: that.data});
        that.$el.html(template);
        that.$el.find('.content').mCustomScrollbar({theme: 'rounded'});
/*        console.log($(window).width());*/
        if($(window).width() > 1900) {
            that.$el.find('.text-content').css({"height":426})
        }else if($(window).width() > 1700) {
            that.$el.find('.text-content').css({"height":377})
        }else if($(window).width() > 1600) {
            that.$el.find('.text-content').css({"height":350})
        }else if($(window).width() > 1500) {
            that.$el.find('.text-content').css({"height":313})
        }



    }
});
mpxd.modules.signal_train_control_system.map_bg = Backbone.View.extend({
    initialize: function (options) {
        this.data = options.data;
        this.render();
    },render: function () {
        var that = this;
        var html = mpxd.getTemplate(that.data.type);
        template = _.template(html, {data: that.data});
        that.$el.html(template);
        that.$el.find('.content').mCustomScrollbar({theme: 'rounded'});
        $i = that.$el.find('#mapimg');
        //Width and height
        var w = $i.width();
        var h = $i.height()+200;
        console.log($(window).width());
        if($(window).width() > 1900) {
            that.$el.find('#svg-container').css({"height":1055})
        }else if($(window).width() > 1700) {
            that.$el.find('#svg-container').css({"height":1030})
        }else if($(window).width() > 1600) {
            that.$el.find('#svg-container').css({"height":980})
        }else if($(window).width() > 1500) {
            that.$el.find('#svg-container').css({"height":850})
        }
        var station_circle_size = 9;
        var parking_box_size = 15;
        data = {"overall_actual":80,"overall_early":82,"overall_late":81,"overall_variance":-3,"progress_date":"31-Jan-16","comdate":"31-Jan-16","comments":[{"message_id":"32","message":"sss","timestamp":"30 Jul 2016","ring":"3"},{"message_id":"31","message":"sebin","timestamp":"29 Jul 2016","ring":"2"},{"message_id":"30","message":"sebin","timestamp":"30 Jul 2016","ring":"2"},{"message_id":"29","message":"Checking...","timestamp":"29 Jul 2016","ring":"2"}],"summary":[{"summary":"Installation & Termination for TRIP Cable Northern","progress_completion":null,"progress_completion_ef":null,"ac_progress_completion":"100","ac_ef":"100","ac_lf":"100","dc_progress_completion":"96.40","dc_ef":"100","dc_lf":"100","data_date":"2016-04-01"},{"summary":"Installation & Termination for TRIP Cable Southern","progress_completion":null,"progress_completion_ef":null,"ac_progress_completion":"95.02","ac_ef":"100","ac_lf":"100","dc_progress_completion":"23.13","dc_ef":"20","dc_lf":"12.73","data_date":"2016-04-01"},{"summary":"Overall T&C for PS&DS","progress_completion":"42.44","progress_completion_ef":"76.45","ac_progress_completion":null,"ac_ef":null,"ac_lf":null,"dc_progress_completion":null,"dc_ef":null,"dc_lf":null,"data_date":"2016-04-01"},{"summary":"Overall Installation PS & DS (Station)","progress_completion":"79.50","progress_completion_ef":"86.00","ac_progress_completion":null,"ac_ef":null,"ac_lf":null,"dc_progress_completion":null,"dc_ef":null,"dc_lf":null,"data_date":"2016-04-01"}],"i_pscada":{"KAJD":["N\/A"],"KWDE2":["N\/A"],"Semantan Portal":["N\/A"],"STN 01":["In Progress"],"STN 02":["In Progress"],"STN 04":["In Progress"],"STN 05":["In Progress"],"STN 06":["In Progress"],"STN 07":["In Progress"],"STN 08":["In Progress"],"STN 09":["In Progress"],"STN 10":["In Progress"],"STN 12":["In Progress"],"STN 13":["In Progress"],"STN 14":["In Progress"],"STN 15":["N\/A"],"STN 16":["N\/A"],"STN 17":["N\/A"],"STN 18":["N\/A"],"STN 20":["N\/A"],"STN 21":["N\/A"],"STN 22":["N\/A"],"STN 23":["N\/A"],"STN 24":["N\/A"],"STN 25":["N\/A"],"STN 26":["N\/A"],"STN 27":["N\/A"],"STN 28":["N\/A"],"STN 29":["N\/A"],"STN 30":["N\/A"],"STN 31":["N\/A"],"STN 33":["N\/A"],"STN 34":["N\/A"],"STN 35":["N\/A"],"SUBD":["In Progress"]},"project_spend_to_date":15.50896,"awarded_packages":21.35293,"wpcs_payment":12.83955,"variation_orders":407.05,"pdp_reimbursables":1446.98,"retention_sum":398.4,"contingency_sum":548.16,"KAJD":"1","KWDE2":"2","SEMAN":"1","STN01":"2","STN02":"2","STN04":"3","STN05":"2","STN06":"2","STN07":"3","STN08":"2","STN09":"2","STN10":"2","STN12":"2","STN13":"2","STN14":"2","STN15":"1","STN16":"1","STN17":"1","STN18":"1","STN20":"1","STN21":"1","STN22":"1","STN23":"4","STN24":"4","STN25":"5","STN26":"5","STN27":"5","STN28":"5","STN29":"5","STN30":"1","STN31":"1","STN33":"1","STN34":"2","STN35":"2","SUBD":"1"};
        stations = [
            [5.066666666666666,50.162962962962965,93, "STN01"],
            [5.916666666666667,54.04444444444444,95, "STN02"],
            [9.466666666666667,64.88888888888889,95, "STN04"],
            [8.883333333333333,69.3037037037037,99, "STN05"],
            [16.166666666666664,72.23703703703703,90, "STN06"],
            [20.233333333333334,65.62962962962963,90, "STN07"],
            [21.883333333333333,58.42962962962963,78, "STN08"],
            [26.55,59.58518518518518,90, "STN09"],
            [30.283333333333335,58.84444444444444,90, "STN10"],
            [33.18333333333333,56.62222222222222,90, "STN12"],
            [34.25,47.17037037037037,90, "STN13"],
            [33.38333333333333,41.15555555555556,96, "STN14"],
            [41.05,36.50370370370371,74, "STN15"],
            [40.71666666666667,32.148148148148145,47, "STN16"],
            [42.983333333333334,29.333333333333332,99, "STN17"],
            [43.78333333333334,25.125925925925923,39, "STN18"],
            [47.099999999999994,25.6,72, "STN20"],
            [49.166666666666664,27.348148148148148,75, "STN21"],
            [50.949999999999996,29.037037037037038,82, "STN22"],
            [53.88333333333334,32.41481481481481,47, "STN23"],
            [57.15,34.785185185185185,84, "STN24"],
            [60.45,35.644444444444446,94, "STN25"],
            [63.96666666666667,39.2,77, "STN26"],
            [70.05,35.288888888888884,78, "STN27"],
            [72.33333333333334,35.7037037037037,90, "STN28"],
            [76.48333333333333,39.08148148148148,90, "STN29"],
            [78.18333333333334,44.32592592592592,90, "STN30"],
            [80.48333333333333,49.03703703703704,90, "STN31"],
            [88.16666666666667,54.48888888888889,71, "STN33"],
            [90.71666666666667,56.38518518518518,90, "STN34"],
            [94.1,59.88148148148148,90, "STN35"],
            /* Legend */
            [43.8,74.7, 9, 1],[51.3,74.7, 19, 1],[58.6,74.7, 39, 1]
        ];
        parkings = [
            [2.7000000000000003,49.36296296296297,68],
            //[6.800000000000001,68.5925925925926,82],
            //[10.05,65.8074074074074,86],
            [26.166666666666664,61.392592592592585,67, true],
            [29.916666666666668,60.91851851851852,78, true],
            [32.95,58.72592592592593,99],
            [35.4,46.400000000000006,75, true],
            //[50.38333333333333,30.992592592592594,86],
            [56.53333333333334,36.82962962962963,74],
            [64.8,40.41481481481482,73, true],
            [69.68333333333334,37.007407407407406,91],
            //[72.08333333333333,37.6,100],
            //[75.78333333333333,40.474074074074075,62],
            [86.6,56.15,20],
            //[88.86666666666667,51.55555555555556,61],
            //[93.60000000000001,61.86666666666667,73]
            [93.60000000000001,61.86666666666667,73]
        ];
        paths = [
            ["m 67.332931,422.69134 c -4.518327,-6.6048 -7.858515,-14.48015 -5.304392,-16.20095 1.294609,-0.87221 6.592337,-2.83349 4.91789,0.5917 -1.66031,3.39627 2.67555,8.33221 4.285394,10.74559 4.05397,6.07746 6.669809,10.06341 4.895096,11.36111 -2.703786,1.97706 -5.587249,-1.8099 -8.793988,-6.49745 z",80,false,"STN01"],
            ["m 123.00317,514.6746 c -1.39592,-0.81298 0.45818,-5.43539 0.95937,-8.56968 0.73644,-4.60545 -2.28355,-13.7674 -6.09658,-18.49557 l -2.39012,-2.96377 -5.07156,3.86111 c -3.88031,2.95418 -5.69351,5.46774 -8.04013,6.68127 -1.18147,0.61099 -2.718534,-2.16464 -2.718534,-4.25611 0,-2.44101 1.911464,-2.73169 7.594684,-7.48536 l 6.90025,-5.77164 -1.86682,-3.65928 c -1.42663,-2.79642 -2.87062,-3.97887 -6.12381,-5.01463 -3.84936,-1.22558 -4.38134,-1.79805 -5.55574,-5.9786 -1.097184,-3.90564 -2.140424,-5.18207 -6.721228,-8.22355 -3.4063,-2.26166 -6.97191,-5.88199 -9.58974,-9.73691 -4.166951,-6.13611 -8.333798,-9.609 -6.334448,-11.60834 1.999341,-1.99934 6.166508,1.47317 10.296868,7.06423 2.27189,3.07534 6.54181,7.37271 9.488714,9.54972 3.834494,2.8327 5.890824,5.25372 7.231854,8.51439 1.0437,2.53772 2.53838,4.5602 3.37385,4.56522 4.50234,0.027 7.13401,3.57453 13.9966,18.86736 8.10139,18.05342 8.46788,19.40088 6.93383,25.49312 -1.24584,4.94771 -3.55216,8.74833 -6.26731,7.16702 z",80,false,"STN02"],
            ["m 112.38387,549.55166 c -1.50904,-2.44168 -2.35007,-15.3532 -0.87297,-18.20959 0.76366,-1.47675 3.78255,-7.3232 5.36295,-8.88203 3.29747,-3.25248 5.60197,-1.67137 5.05121,0.19704 l -1.60873,5.45752 -2.14133,3.62929 c -1.65675,2.80798 -2.06619,4.88543 -1.8093,9.18013 0.3097,5.17731 1.75032,8.11221 -0.37125,8.22189 -1.25105,0.0647 -3.30793,0.89544 -3.61058,0.40575 z",80,false,"STN04"],
            ["m 182.18321,582.8973 -11.5,-3.84638 c -6.00145,-1.12981 -12.17937,-0.28855 -18.37501,-0.0535 -21.55709,0.81766 -28.02425,-1.33007 -31.60243,-4.84398 -3.23855,-3.18038 -4.60974,-10.82772 -5.24045,-14.17625 -0.44812,-2.37917 4.13957,-3.09038 4.66677,-1.13816 0.41895,1.55138 1.28964,4.30312 1.79411,5.75036 2.78881,8.00051 7.35623,10.53585 33.98184,8.61916 17.15383,-1.23485 19.47202,0.98152 25.46537,3.52544 4.13774,1.49711 14.42514,5.63212 18.36864,4.12683 3.55225,-1.35423 5.73675,2.8042 3.55418,4.04685 -4.78843,2.72631 -9.85989,2.27148 -21.11302,-2.01028 z",80,false,"STN05"],
            ["m 213.03672,576.49273 c -0.66,-0.66 -3.55703,-3.24807 -3.55703,-3.83073 0,-0.58265 13.40513,-15.02593 24.26763,-25.85442 l 19.75,-19.68816 2.40583,1.98401 2.40582,1.98402 -19.48006,19.27606 c -2.49255,2.79292 -22.99347,23.18513 -25.79219,26.12922 z",80,false,"STN06"],
            ["m 262.89301,521.71681 c -0.34319,-0.41313 -1.61428,-1.48859 -1.03951,-2.66804 2.06615,-4.23979 1.9377,-8.13097 1.23808,-11.02272 -1.22728,-5.07268 -2.40158,-10.5228 -2.43038,-14.18161 -0.0419,-5.32823 0.1479,-5.71862 6.07875,-12.5 2.87336,-3.28542 8.29192,-9.21525 9.60525,-10.38781 2.05946,-1.83873 3.70622,-0.83381 3.62704,1.24513 l 0.56673,2.51961 -6.14662,6.37381 c -2.04272,2.11821 -6.59118,6.17984 -7.95685,9.77693 -1.19445,3.14611 -0.58429,7.5016 1.66439,15.73476 1.97689,7.23805 -0.73681,12.94305 -2.31043,15.72755 -0.27493,0.48648 -2.10856,0.33085 -2.89645,-0.61761 z",80,false,"STN07"],
            ["m 313.65418,472.13367 c -8.93121,-2.57802 -24.23703,-10.40586 -27.87589,-3.7502 -0.89926,-1.68029 -0.55318,-5.75625 -0.0926,-6.32571 0.25793,-0.31892 2.92798,-1.67145 3.73182,-1.73338 0.92097,-0.071 2.24941,-0.14314 3.98668,0.1792 4.87501,0.90453 25.88763,7.9561 36.67485,10.59765 3.5345,0.86552 5.85203,1.36819 6.30405,1.80874 1.42366,1.38752 -0.30748,5.43373 -1.97073,5.27378 -8.10053,-2.30506 -13.2279,-3.89858 -20.75818,-6.05008 z",80,false,"STN08"],
            ["m 348.02431,473.40671 c -0.33429,-1.33189 -2.2514,-1.1928 -1.43413,-2.2645 0.43472,-0.57007 3.0478,-2.27843 3.9732,-2.9855 5.02637,-3.84051 5.819,-3.793 14.89748,-2.10499 4.25769,0.79166 10.67292,1.79995 14.98645,1.4998 2.4964,-0.1737 1.63659,-0.8927 1.63659,0.63308 0,1.33206 0.64785,4.54137 0.30514,4.93393 -0.61539,0.70489 -4.38228,0.30306 -5.16567,0.26229 -6.67247,-0.38782 -13.72927,-2.4536 -19.2605,-2.69837 -1.19412,0.34079 -2.33244,1.54081 -3.90741,2.61399 -2.6048,1.77491 -5.93827,3.63075 -6.72752,3.49798 -0.66529,-0.11192 1.06014,-1.93836 0.69637,-3.38771 z",80,false,"STN09"],
            ["m 392.02489,469.162 c 0.33545,-2.03455 -2.83331,-2.89272 4.9738,-3.7964 8.30157,-1.41174 12.03981,-3.55815 17.58254,-8.20425 3.61785,-3.03261 7.12358,-4.51075 8.75933,-2.90097 0.26271,2.20732 0.47798,3.61527 -2.36967,5.51499 -4.40499,2.93867 -9.15427,6.64645 -13.95272,8.71662 -5.05545,2.18105 -12.43409,3.23134 -13.70371,2.97184 -1.30615,-0.26697 -0.96735,-1.50556 -1.28957,-2.30183 z",80,false,"STN10"],
            ["m 434.98344,437.56379 c -2.16364,-17.50926 -0.58966,-28.40735 3.32086,-36.90787 1.38453,-3.00963 4.03508,-9.37475 4.03508,-11.42305 0,-2.08072 -2.09173,-6.53555 -1.31048,-7.75765 0.80473,-1.25885 3.94118,-1.32357 4.90049,-0.36426 0.78189,0.78189 1.93914,6.61476 1.65791,9.60476 -0.37759,4.01466 -2.56798,9.71951 -4.31057,13.70523 -6.43744,13.83063 -2.26621,21.02175 -2.82452,38.79311 -0.40986,6.93753 -2.01757,11.38625 -9.28049,13.51943 -0.76201,0 -1.37195,0.51958 -1.37416,-5.96569 -4.4e-4,-1.3051 2.81609,-0.58688 4.03632,-2.56418 1.52843,-2.47673 1.50225,-7.78569 1.14956,-10.63983 z",80,false,"STN12"],
            ["m 440.03197,371.96172 c -0.74563,-0.30087 -2.21721,-2.44226 -2.26378,-4.38071 -0.0586,-2.44079 1.41131,-7.76967 2.42639,-11.1158 2.23888,-7.38029 1.99151,-8.15689 -4.01082,-12.59107 -2.49825,-1.84556 -6.81259,-5.43477 -7.55931,-6.49652 -1.0136,-1.44122 0.16704,-2.48566 1.87687,-3.55345 1.59338,-0.99508 4.78988,1.80516 9.50245,5.26466 7.50907,5.51241 8.53037,8.19387 6.35467,16.68441 -1.80786,4.1933 -2.94363,8.6279 -2.92416,13.19194 0.21359,3.07238 -1.29187,3.84813 -3.40231,2.99654 z",80,false,"STN13"],
            ["m 430.75538,325.1811 c -2.99358,-2.45045 -0.35412,-6.01319 3.21349,-6.01319 1.83098,0 3.70436,-2.5548 6.35537,-9.7632 3.43639,-9.34392 4.42537,-11.02249 11.8321,-8.98709 0.90072,0.24752 3.5945,1.91307 6.6925,2.15705 11.43086,-0.69218 14.83728,-1.60151 21.93226,4.09999 6.91004,5.69509 10.10451,7.61649 16.05219,6.93524 11.64912,-2.17722 17.17415,-7.4127 24.87977,-15.32325 2.07841,-1.39488 0.39718,0.81394 2.12532,0.76395 4.76814,-0.13793 4.75765,0.0488 -4.57591,8.78454 -7.46689,6.98863 -14.89241,10.36682 -23.40468,10.3678 -7.60809,8.8e-4 -9.63031,-0.41447 -16.37783,-6.00242 -4.80616,-3.98021 -8.0959,-5.62131 -14.49967,-4.70283 -4.46511,0.55474 -10.06266,0.98551 -13.11356,-0.85479 -7.45281,-8.05452 -6.62089,15.67324 -14.87491,17.70338 -0.87725,-0.0198 -4.70994,2.08437 -6.23644,0.83482 z",80,false,"STN14"],
            ["m 528.14961,286.86496 c -0.30769,-3.00493 -0.77414,-1.99723 -0.2015,-3.44221 2.25469,-5.68948 1.3582,-7.48869 -1.00953,-12.21897 -1.26297,-1.96552 -3.05382,-4.65359 -3.8555,-6.20936 -0.73366,-1.4238 -0.51391,-1.59774 0.32417,-2.21056 1.38896,-1.01562 1.92883,-2.30193 3.46321,-0.50326 1.48579,1.74172 3.79542,5.89154 4.88065,7.92612 1.69773,3.18289 2.65157,6.0442 2.09821,9.6156 -0.42741,2.75849 -1.94808,6.45338 -2.14622,7.45579 -0.27021,1.367 -1.80949,0.60082 -3.55349,-0.41315 z",70,true,"STN15"],
            ["m 525.69888,253.85572 c -0.92596,-1.02319 -1.57057,-2.62918 -1.26691,-3.12357 0.33924,-0.55233 9.31134,-9.70184 13.35809,-11.6444 1.15257,-0.55327 5.96,-2.17112 6.55494,-2.32714 1.20155,-0.3151 4.75812,0.29778 3.52003,1.93375 l 0.29104,2.05573 -6.27177,2.92568 c -1.73444,0.80909 -5.27111,3.33236 -7.78264,5.78159 -1.68484,1.64304 -4.70201,4.68496 -5.47525,5.22767 -1.24849,0.87627 -1.92455,0.27896 -2.92753,-0.82931 z",70,true,"STN16"],
            ["m 550.39107,227.59249 c -1.58987,-2.46971 1.06305,-16.43579 3.88752,-20.24705 0.4425,-0.59709 3.37067,-3.15631 3.75602,-3.15631 2.16956,0 2.40973,0.29378 1.27331,4.09508 -0.40508,1.35497 -1.70588,4.88319 -2.39044,7.05663 -0.74604,2.36861 -1.57759,9.5157 -1.5117,11.65892 0.0722,2.34794 -0.37252,3.70238 -2.48227,3.70238 -1.39227,0 -2.04191,-2.34766 -2.53244,-3.10965 z",70,true,"STN17"],
            ["m 589.3152,197.87992 c -7.43928,-3.78353 -12.89711,-4.93638 -17.7216,-3.75366 -2.56901,0.62979 -4.94133,2.19863 -5.54685,2.19776 -0.96304,-10e-4 -4.47069,1.86644 -4.57096,0.88578 l -0.38751,-3.78994 5.85431,-3.68211 c 3.79928,-2.38958 14.35899,-2.10852 22.04494,1.12813 3.34327,1.40789 7.05039,3.42573 8.3342,4.2649 0.44965,0.29391 2.82364,2.06256 3.09841,2.27485 1.08861,0.8411 1.87952,2.62264 0.55216,4.08935 -1.38072,1.52567 -0.92259,1.41998 -2.92393,0.74868 -1.05193,-0.35285 -6.69329,-3.32628 -8.73317,-4.36374 z",70,true,"STN18"],
            ["m 616.72891,216.11396 c -3.61898,-2.19274 -6.95407,-5.12119 -8.32046,-6.17731 -0.87062,-0.67292 -3.75116,-4.40951 -3.21554,-5.26718 0.79537,-1.2736 4.7362,1.12306 5.79367,1.28749 3.22108,3.39596 10.12427,7.31579 12.0012,9.24989 0.19124,0.4482 1.65985,3.09293 1.65985,3.51982 0,2.09968 -3.33078,-1.58699 -3.57623,-0.29287 -0.08,0.42204 -2.28938,-1.07583 -4.34249,-2.31981 z",70,true,"STN20"],
            ["m 634.03431,222.96788 c 0.89802,-0.65276 0.19546,-1.48614 1.32959,-1.40965 3.03824,1.78794 14.96247,5.03769 13.1594,8.62586 -0.68067,1.27183 -1.48013,1.55419 -3.70713,0.95523 -2.54615,-1.69582 -9.83331,-4.15342 -12.21299,-5.83257 -1.44476,-1.01945 -0.10707,-1.15619 1.43113,-2.33887 z",70,true,"STN21"],
            ["m 665.58677,262.23646 c -2.81386,-2.81501 -3.37925,-3.13948 -4.35852,-10.10063 -0.4293,-3.0517 -0.41152,-6.78791 -0.28938,-10.05115 0.0259,-0.69107 0.29826,-3.52011 0.021,-4.34922 -0.4998,-1.49478 -2.87267,-1.22937 -2.7535,-2.16959 0.23228,-1.83262 -0.42827,-3.8964 -0.0604,-4.26427 0.28508,-0.28508 5.08535,1.24295 6.0398,1.8006 2.91057,1.70053 1.84836,3.02903 1.92426,11.28901 0.11614,12.63904 2.03667,16.11237 7.73845,14.22753 2.4828,-0.82074 5.35114,-2.3501 6.49767,-2.54239 0.36101,-0.0605 3.33145,-0.93241 3.74706,-0.94024 1.93947,-0.0365 1.35016,1.22081 1.35016,3.40678 0,2.5785 -2.71362,2.49356 -6.24247,3.64441 -6.62863,1.11234 -10.06562,3.39821 -13.61413,0.0492 z",70,true,"STN22"],
            ["m 714.24311,278.26538 c -1.33061,-0.50827 -17.79441,-11.99002 -19.35742,-13.34485 -0.35138,-0.30458 -2.99592,-3.90256 -1.36831,-3.98775 l 2.82617,-1.60188 13.16506,9.56725 c 4.30761,3.13041 9.35028,7.74853 16.02617,6.22345 1.07865,-0.24641 0.70834,1.35807 0.70834,2.86814 0,1.34029 -0.32117,1.92392 -1.03986,2.20563 -0.41488,0.16262 -3.43907,0.27093 -4.27959,0.2468 -1.5125,-0.0434 -5.85609,-1.86186 -6.68056,-2.17679 z",70,true,"STN23"],
            ["m 758.45487,283.2123 c -2.49281,-0.72932 -4.99737,-1.20478 -9.04477,-1.90561 -2.33507,-0.40432 -9.72385,-0.33791 -11.89887,-0.25929 -3.0545,0.11041 -2.27041,-0.97088 -2.27041,-2.41964 0,-1.37512 1.4293,-2.01016 2.53084,-2.35997 0.72959,-0.2317 8.1088,-0.009 9.9053,0.0392 1.12677,0.0303 5.19795,0.2537 9.16263,1.21268 5.0991,1.23338 10.31111,3.39443 11.90969,4.87307 1.36256,1.26032 0.61614,4.41573 -1.11729,4.2656 -0.17857,-0.0155 -4.11366,-1.68141 -4.51045,-1.82699 -0.99837,-0.3663 -2.40452,-0.95717 -4.66667,-1.61901 z",70,true,"STN24"],
            ["m 813.58474,318.37339 c -0.4544,-0.1438 -3.28458,-0.38143 -5.19364,-1.75692 -2.55244,-1.83905 -7.24207,-6.7064 -8.84802,-8.234 -3.57501,-3.40058 -9.29631,-8.39486 -13.72988,-11.3888 l -9.86877,-6.66425 2.86787,-3.35518 c 1.50722,-1.76331 0.61069,-0.19705 1.83532,0.45835 3.34219,1.78869 10.80819,6.51877 17.85781,13.0692 1.59874,1.48553 9.09478,8.49716 10.06086,9.47469 1.60646,1.62551 3.68876,1.09866 4.08132,2.10344 0.33661,0.86156 1.11379,2.02212 1.0146,3.09588 -0.22928,2.48205 1.01932,3.54469 -0.0775,3.19759 z",70,true,"STN25"],
            ["m 822.5082,311.33193 c -0.43867,-0.78386 -1.52046,-2.36407 -0.23755,-4.03012 2.06848,-1.73998 6.42007,-4.02021 8.40223,-5.98956 2.43145,-2.41574 4.5496,-5.4945 7.0572,-7.37796 3.27603,-2.43414 5.60987,-2.83975 15.36552,-6.44101 21.0463,-7.76917 25.69391,-8.25689 31.65073,-7.91573 2.66594,0.15268 6.95469,0.5755 7.67209,1.05769 0.62068,0.41718 0.57704,0.80472 0.71423,1.997 0.18588,1.61547 -0.49827,2.28402 -1.48935,2.55936 -0.62052,0.17239 -6.14846,-0.2022 -7.74781,-0.2022 -5.24032,0 -10.02937,1.12104 -28.04897,7.51977 -8.11355,2.88111 -12.26641,4.29725 -15.1384,6.28378 -2.93949,2.15501 -4.56754,5.30866 -7.10991,7.61509 -5.04324,3.77226 -8.68874,6.05877 -8.23124,5.54555 0.26636,-0.2988 -2.33491,0.31441 -2.85877,-0.62166 z",70,true,"STN26"],
            ["m 902.05554,283.82865 c -0.19775,-0.41656 -0.39431,-2.04283 -0.35811,-3.14283 0.0605,-1.71234 3.00274,-1.67089 7.96699,-1.76387 2.78523,-0.0522 7.21831,0.43618 9.03079,0.72774 3.20842,0.51611 3.03578,2.15258 2.09736,4.21211 -0.58599,1.28623 -1.4355,2.06454 -2.3833,1.26292 -0.77801,-0.65801 -5.509,-1.50886 -7.89071,-1.47906 -6.28482,0.0787 -8.26782,0.59418 -8.46302,0.18299 z",70,true,"STN27"],
            ["m 954.37001,299.08427 c -10.26758,-11.5112 -11.42897,-12.88139 -15.49454,-12.83419 -1.17057,0.0136 -4.38244,0.92308 -6.02762,1.0497 -3.25919,0.25084 -4.13851,-0.39005 -4.42444,-1.88581 -0.39035,-2.04196 0.70997,-2.27125 2.71241,-2.80555 1.49536,-0.39899 4.41449,-1.05772 6.91988,-1.21727 1.88788,-0.12022 3.51083,0.19305 4.28097,0.27297 4.08144,0.42352 6.57356,3.64364 14.28535,12.9193 5.16118,6.20781 8.42322,9.38042 10.6617,10.36521 0.88536,0.38951 3.05807,0.59312 3.64704,0.59312 3.58653,0 5.59769,2.41436 3.83314,5.10739 -0.87065,1.32878 -0.69344,0.7675 -1.59722,1.24247 -0.70392,0.36993 -2.68726,-1.82052 -4.61446,-2.07352 -1.68247,-0.22088 -3.56001,0.75922 -5.52971,-1.23529 -2.03303,-2.05864 -4.52722,-4.87359 -8.6525,-9.49853 z",70,true,"STN28"],
            ["m 996.10389,350.11387 c -2.03845,-7.72711 -7.97917,-26.41098 -13.4294,-30.9597 -2.41708,-1.6976 -1.95648,-3.34705 -1.0161,-4.28743 0.8422,-0.84215 4.68719,0.66344 6.63873,3.34575 1.69595,2.23458 5.14112,8.00862 8.59505,18.67093 0.94808,2.92673 2.78249,9.1135 3.10701,10.37266 0.51982,2.01701 0.0151,2.71469 -1.00513,3.46067 -2.3393,1.71057 -1.81246,1.48431 -2.89016,-0.60288 z",70,true,"STN29"],
            ["m 1012.3771,386.08765 c -6.7808,-4.63733 -7.2027,-5.65514 -9.3648,-12.05358 -0.9867,-5.06018 -2.9866,-12.00886 -3.55396,-13.8257 -1.00273,-3.21091 0.26755,-4.43753 1.89106,-4.86207 2.1529,-0.56301 1.9819,1.00178 3.5251,6.18988 0.6495,2.18331 1.5033,5.07068 2.2206,7.70976 2.0009,7.36087 3.8315,9.88976 8.0665,12.38443 3.6483,2.14899 9.5051,5.05332 10.6044,6.11036 1.2777,1.22866 -0.01,2.47732 -0.7214,3.80844 -0.6425,1.20065 1.563,3.20892 -0.7297,1.79016 -1.9807,-1.22567 -8.1017,-4.8837 -11.9378,-7.25168 z",70,true,"STN30"],
            ["m 1125.9201,453.36446 c -2.1246,-2.8875 -4.435,-6.64509 -7.0546,-10.39077 -5.1856,-7.4146 -7.2782,-9.0854 -12.6788,-8.209 -2.1268,0.34513 -5.6507,0.20653 -8.8202,-0.83427 -5.3162,-1.74575 -36.4335,-15.44774 -43.5768,-21.52237 -3.1216,-2.65458 -8.4119,-6.2106 -11.8398,-8.28309 -2.6122,-1.57932 -8.8415,-5.54442 -9.6012,-6.26319 -1.0395,-0.98359 -0.3694,-2.57131 0.5469,-3.96972 0.8786,-1.341 1.1936,-1.30664 3.8143,0.31167 7.8412,4.84205 12.4706,7.84896 20.9816,13.98382 5.1831,3.73605 15.5096,9.32728 25.0546,13.75434 7.2432,3.37524 12.9415,7.1935 18.8051,8.05597 1.8914,0.27821 2.2162,-0.54306 4.6859,-0.75076 3.9366,-0.33106 9.4262,0.42805 11.8293,1.16239 3.687,1.12677 4.9284,0.47336 5.4531,4.37573 0.4155,3.0909 -0.5939,5.8311 2.1042,8.55816 2.5513,2.57867 4.1791,5.825 5.8407,7.91918 2.0121,2.53578 4.2843,5.14146 5.0386,6.61175 0.6854,1.3359 -1.0712,3.39181 -3.4666,3.39181 -0.8948,0 -1.5616,-1.28532 -2.347,-2.25358 -0.8118,-1.00072 -3.3216,-3.68051 -4.7693,-5.64807 z",70,true,"STN31"],
            ["m 1145.9424,446.82586 c -4.8956,0.20352 -14.3146,-4.24449 -14.3889,-5.67477 -0.022,-0.42893 -1.9983,-1.56208 -1.3002,-2.51682 0.707,-0.96685 0.9827,-2.57775 3.5431,-1.68392 1.7884,0.62432 8.1398,4.54365 12.0035,4.86127 3.7396,0.30742 5.9288,0.80009 8.1003,1.46704 4.1712,1.28112 5.656,2.39624 4.6423,4.01949 -0.5904,0.31867 -2.7879,1.86053 -3.2603,2.02038 -1.2116,0.40994 -5.6206,-2.64729 -9.3398,-2.49267 z",70,true,"STN33"],
            ["m 1185.9023,463.41233 c -4.2328,-2.03502 -4.3115,-1.14586 -9.2856,1.67478 -4.5289,2.56824 -10.0797,2.75051 -12.7934,-2.33116 l -3.1216,-5.84554 0.9661,-3.32426 c 1.3316,-0.52218 3.4893,1.60501 4.2287,2.19629 0.2834,0.22662 1.7389,4.47338 2.038,4.89119 1.7509,2.446 4.5087,1.04858 9.4226,-1.45833 2.1562,-1.1 5.3326,-1.60716 6.8187,-1.60716 3.9523,0 8.7166,4.45257 12.2564,9.26599 1.3722,1.86592 5.8947,6.8609 6.1301,7.64873 0.2603,0.87118 -0.2945,1.49967 -1.1028,2.39287 -0.9045,0.99947 -1.8724,0.39316 -2.2709,0.39316 -4.5599,-4.60256 -7.378,-10.68752 -13.2863,-13.89656 z",70,true,"STN34"]
        ];
        depot = [
            [-23,155,20,"dpt1"],
            [249,140,70,"dpt2"]
        ]

        /*for (var i = 0; i < parkings.length; i++) {
         UpperRange = 100;
         LowerRange = 60;
         parkings[i].push(Math.floor(Math.random() * (UpperRange - LowerRange + 1)) + LowerRange);

         }*/

//Create SVG element
        svg = d3.select("#svg-container")
            .append("svg")
            .attr("width", w)
            .attr("height", h)
            .style("position","absolute")
            .style("top","-104px")
            .style("left","-2px");

        var v1 = svg.selectAll("path")
            .data(paths)
            .enter()
            .append("path")
            .attr("fill-rule","evenodd")
            .attr("clip-rule","evenodd")
            .attr("fill","#555")
            .attr("class",function(d,i) {
                var status = d[1];
                var c = "viaduct group-"+d[3]+" ";
                /*if (status < 40) { c += "glow-red"; } else
                 if (status < 60) { c += "glow-yellow"; } else
                 { c += "glow-green"; }*/
                return c;
            })
//			.attr("transform",function(d,i){return ((!d[2]) ? "translate(1, -123)" : "")})
            .attr("d",function(d,i) {
                return d[0];
            })/*
         .style("filter", function(d,i) {

         var status = d[1];
         if (status < 40) { return "url(#drop-shadow)" } else //delayed
         if (status < 60) { /*return "url(#drop-shadow)"* } else //critical
         { return ""; }


         })*/
            .attr('id',function(d,i) {
                return "path"+i;
            });

//Draw big circles
        var bigcircles = svg.selectAll(".bigcircle")
            .data(stations)
            .enter()
            .append("circle")
            .attr("class",function(d,i) {


                var status = d[2];
                var c = "bigcircle station group-"+d[3]+" ";

                //if (status < 40) { c += "glow-red"; } else
                //if (status < 60) { c += "glow-yellow"; } else
                //{ c += "glow-green"; }
                if ((typeof d[3] != "undefined") && (d[3] == 1)) {
                    c += " legend ";
                    if (status < 10) { c += "glow-green on"; } else
                    if (status < 20) { c += "glow-yellow on"; } else
                    if (status < 40) { c += "glow-red on"; } else
                    { c += "glow-gray on"; }
                }
                return c;
            })/*
         .style("filter", function(d,i) {

         var status = d[2];
         if (status < 40) { return "url(#drop-shadow)" } else //delayed
         if (status < 60) { /*return "url(#drop-shadow)"* } else //critical
         { return ""; }


         });*/

        bigcircles.attr("cx", function(d, i) {
            return d[0] + "%";
        })
            .attr("cy", function(d, i) {
                return d[1] + "%";
            })
            .attr("r", function(d) {
                return station_circle_size;
            });

//Draw small circles
        var smallcircles = svg.selectAll(".smallcircle")
            .data(stations)
            .enter()
            .append("circle")
            .attr("class","smallcircle");

        smallcircles.attr("cx", function(d, i) {
            return d[0] + "%";
        })
            .attr("cy", function(d, i) {
                return d[1] + "%";
            })
            .attr("r", function(d) {
                return station_circle_size-3;
            });

        var bigparking = svg.selectAll(".bigparking")
            .data(parkings)
            .enter()
            .append("rect")       // attach a rectangle
            .attr("x", function(d, i) {
                return d[0] + "%";
            })         // position the left of the rectangle
            .attr("y", function(d, i) {
                return d[1] + "%";
            })          // position the top of the rectangle
            .attr("height", parking_box_size)    // set the height
            .attr("width", parking_box_size)     // set the width
            .attr("rx", 3)         // set the x corner curve radius
            .attr("ry", 3)        // set the y corner curve radius
            .attr("class", function(d,i) {
                var status = d[2];
                var blur = d[3];
                var c = "bigparking";
                if ((typeof blur != "undefined") && (blur)) c += " blurred"
                //if (status < 40) { c += "glow-red"; } else
                //if (status < 60) { c += "glow-yellow"; } else
                //{ c += "glow-green"; }
                return c;
            })


        var smallparking = svg.selectAll(".smallparking")
            .data(parkings)
            .enter()
            .append("rect")       // attach a rectangle
            .attr("x", function(d, i) {
                return d[0]+0.17 + "%";
            })         // position the left of the rectangle
            .attr("y", function(d, i) {
                return d[1]+0.27 + "%";
            })          // position the top of the rectangle
            .attr("height", parking_box_size-4)    // set the height
            .attr("width", parking_box_size-4)     // set the width
            .attr("rx", 2)         // set the x corner curve radius
            .attr("ry", 2)        // set the y corner curve radius
            .attr("class", function(d,i) {
                var blur = d[3];
                var c = "smallparking";
                if ((typeof blur != "undefined") && (blur)) c += " blurred"
                return c;
            });



        var parkingletter = svg.selectAll(".parkingletter")
            .data(parkings)
            .enter()
            .append("text")         // append text
            //.style("fill", "black")   // fill the text with the colour black
            .attr("x", function(d, i) {
                return d[0]+0.17 + "%";
            })           // set x position of left side of text
            .attr("y", function(d, i) {
                return d[1]+0.27 + "%";
            })           // set y position of bottom of text
            .attr("dx", "2.7px")           // set offset y position
            .attr("dy", "9px")           // set offset y position
            .attr("text-anchor", "start")  // set anchor y justification
            .attr("class", function(d,i) {
                var blur = d[3];
                var c = "parkingletter";
                if ((typeof blur != "undefined") && (blur)) c += " blurred"
                return c;
            })
            .text("P");          // define the text to display


//var depotgroup1 = svg.append('g');
//var depotgroup2 = svg.append('g');

        for (i = 0; i < depot.length; i++) {

            var g = svg.append('g')
                .attr('transform', 'scale(0.3,0.3)');

            var depotgroup = g.append('svg')
                .attr('x', depot[i][0] + "%")
                .attr('y', depot[i][1] + "%")


            bigdepot = depotgroup.selectAll(".bigdepot")
                .data([depot[i]])
                .enter()
                .append("path")
                .attr("class", function(d,i) {
                    var status = d[2];
                    var c = "bigdepot group-"+d[3];
                    //if (status < 40) { c += "glow-red"; } else
                    //if (status < 60) { c += "glow-yellow"; } else
                    //{ c += "glow-green"; }
                    return c;
                })
                .attr("transform","matrix(0.738729,0,0,0.70030265,168.70049,76.349168)")
                .attr("d","m 602.84375,430.03125 c -1.27276,0.19714 -2.39161,0.94937 -3.03125,2.0625 l -35.625,61.71875 c -0.74472,1.29698 -0.7568,2.91268 0,4.21875 0.75709,1.30666 2.16467,2.12617 3.6875,2.125 l 71.25,0 c 1.52287,0.001 2.9304,-0.81842 3.6875,-2.125 0.75682,-1.30608 0.74471,-2.92178 0,-4.21875 l -35.625,-61.71875 c -0.87568,-1.52499 -2.61057,-2.33402 -4.34375,-2.0625 z")
                .attr("fill","#ccc")

            smalldepot = depotgroup.selectAll(".smalldepot")
                .data([1])
                .enter()
                .append("path")
                .attr("transform","matrix(0.51302074,0,0,0.48223833,304.89738,179.69186)")
                .attr("d","m 602.84375,430.03125 c -1.27276,0.19714 -2.39161,0.94937 -3.03125,2.0625 l -35.625,61.71875 c -0.74472,1.29698 -0.7568,2.91268 0,4.21875 0.75709,1.30666 2.16467,2.12617 3.6875,2.125 l 71.25,0 c 1.52287,0.001 2.9304,-0.81842 3.6875,-2.125 0.75682,-1.30608 0.74471,-2.92178 0,-4.21875 l -35.625,-61.71875 c -0.87568,-1.52499 -2.61057,-2.33402 -4.34375,-2.0625 z")
                .attr("fill","#ccc")

            dletter = depotgroup.selectAll(".dletter")
                .data([1])
                .enter()
                .append('text')
                .attr("class","parkingletter")
                .attr("x","575.36194")
                .attr("y","439.01147")
                .attr("transform","scale(1.0510781,0.95140407)")
                .attr("style",'font-size:29.947042px;font-style:normal;font-weight:bold;line-height:125%;letter-spacing:0px;word-spacing:0px;fill:#000000;fill-opacity:1;stroke:none;font-family:Century Gothic')
                .text("D")
        }





//Filter settings
        var defs = svg.append("defs");
// create filter with id #drop-shadow
// height=130% so that the shadow is not clipped
        var filter = defs.append("filter")
            .attr("id", "drop-shadow")
            .attr("height", "200%")
            .attr("width", "200%")
            .attr("y","-40%")
            .attr("x","-40%");

// SourceAlpha refers to opacity of graphic that this filter will be applied to
// convolve that with a Gaussian with standard deviation 3 and store result
// in blur
        filter.append("feGaussianBlur")
            .attr("in", "SourceGraphic")
            .attr("stdDeviation", 5)
            .attr("result", "blur");

// translate output of Gaussian blur to the right and downwards with 2px
// store result in offsetBlur
        filter.append("feOffset")
            .attr("in", "blur")
            .attr("dx", 0)
            .attr("dy", 0)
            .attr("result", "offsetBlur");



// overlay original SourceGraphic over translated blurred opacity by using
// feMerge filter. Order of specifying inputs is important!
        var feMerge = filter.append("feMerge");

        feMerge.append("feMergeNode")
            .attr("in", "offsetBlur")
        feMerge.append("feMergeNode")
            .attr("in", "SourceGraphic");
        //console.log(that.data.data[1].data);
        _.each(that.data.data[1].data, function(v,k) {
            var t= 0, c = 0,tt=0.00,cl='text-white';
            if(v.length>0) {
                _.each(v, function (i, x) {
                    t += (i['station_progress']==null || i['station_progress']=="")?0:parseFloat(i['station_progress']);
                    d = parseFloat(i['station_progress']);
                    processVariance(i['station_no'], d);
                    c++;
                })
                tt=parseFloat(t/c).toFixed(2);
            }
            if(tt==100){cl='text-green';}else if(tt>=1){cl='text-yellow';}else if(tt==0){cl='text-red';}
            $('.'+ k.toLowerCase()).text(tt+"%").addClass(cl);
        });
        processVariance('dpt1', parseFloat(data['SUBD']));
        processVariance('dpt2', parseFloat(data['KAJD']));
        processVariance('sbk-s-01', parseFloat(data['SBK-S-01']));
        processVariance('sbk-s-02', parseFloat(data['SBK-S-02']));
        processVariance('sbk-s-03', parseFloat(data['SBK-S-03']));
        processVariance('sbk-s-04', parseFloat(data['SBK-S-04']));
        processVariance('sbk-s-05', parseFloat(data['SBK-S-05']));
        processVariance('sbk-s-06', parseFloat(data['SBK-S-06']));
        processVariance('sbk-s-07', parseFloat(data['SBK-S-07']));
        processVariance('sbk-s-08', parseFloat(data['SBK-S-08']));
        processVariance('sbk-s-09', parseFloat(data['SBK-S-09']));
        processVariance('sbk-s-10', parseFloat(data['SBK-S-10']));
        processVariance('sbk-s-11', parseFloat(data['SBK-S-11']));
        processVariance('sbk-s-12', parseFloat(data['SBK-S-12']));
        processVariance('sbk-s-13', parseFloat(data['SBK-S-13']));
        processVariance('sbk-s-14', parseFloat(data['SBK-S-14']));
        groupGoGreen('ug');

        function groupAddClass(g, c) {
            $('.group-'+g).addClassSVG(c);
        }

        function groupRemoveClass(g, c) {
            $('.group-'+g).removeClassSVG(c);
        }

        function groupGoGrey(g) {
            groupRemoveClass(g, 'glow-grey glow-green glow-yellow glow-red glow-red-blinking glow-yellow-blinking glow-green-blinking glow-kavi-blinking glow-gray-blinking on');
            groupAddClass(g, 's_1 glow-grey on');
        }

        function groupGoGreen(g) {
            groupRemoveClass(g, 'glow-grey glow-green glow-yellow glow-red glow-red-blinking glow-yellow-blinking glow-green-blinking glow-kavi-blinking glow-gray-blinking on');
            groupAddClass(g, 's_5 glow-green on');
        }

        function groupGoYellow(g) {
            groupRemoveClass(g, 'glow-grey glow-green glow-yellow glow-red glow-red-blinking glow-yellow-blinking glow-green-blinking glow-kavi-blinking glow-gray-blinking on');
            groupAddClass(g, 's_2 glow-yellow on');
        }

        function groupGoRed(g) {
            groupRemoveClass(g, 'glow-grey glow-green glow-yellow glow-red glow-red-blinking glow-yellow-blinking glow-green-blinking glow-kavi-blinking glow-gray-blinking on');
            groupAddClass(g, 's_3 glow-red on');
        }
        function groupGoKavi(g) {
            groupRemoveClass(g, 'glow-grey glow-green glow-yellow glow-kavi glow-red glow-red-blinking glow-yellow-blinking glow-green-blinking glow-kavi-blinking glow-gray-blinking on');
            groupAddClass(g, 's_4 glow-kavi on');
        }

        function groupGoRedBlink(g) {
            groupRemoveClass(g, 'glow-grey glow-green glow-yellow glow-red glow-red-blinking glow-yellow-blinking glow-green-blinking glow-kavi-blinking glow-gray-blinking on');
            groupAddClass(g, 'glow-red-blinking on');
            if (detectIE()) repeatBlink();
        }
        function groupGoYellowBlink(g) {
            groupRemoveClass(g, 'glow-grey glow-green glow-yellow glow-red glow-red-blinking glow-yellow-blinking glow-green-blinking glow-kavi-blinking glow-gray-blinking on');
            groupAddClass(g, 'glow-yellow-blinking on');
            if (detectIE()) repeatYBlink();
        }
        function groupGoGreenBlink(g) {
            groupRemoveClass(g, 'glow-grey glow-green glow-yellow glow-red glow-red-blinking glow-yellow-blinking glow-green-blinking glow-kavi-blinking glow-gray-blinking on');
            groupAddClass(g, 'glow-green-blinking on');
            if (detectIE()) repeatGnBlink();
        }
        function groupGoGrayBlink(g) {
            groupRemoveClass(g, 'glow-grey glow-green glow-yellow glow-red glow-red-blinking glow-yellow-blinking glow-green-blinking glow-kavi-blinking glow-gray-blinking on');
            groupAddClass(g, 'glow-gray-blinking on');
            if (detectIE()) repeatGBlink();
        }
        function groupGoKaviBlink(g) {
            groupRemoveClass(g, 'glow-grey glow-green glow-yellow glow-red glow-red-blinking glow-yellow-blinking glow-green-blinking glow-kavi-blinking glow-gray-blinking on');
            groupAddClass(g, 'glow-kavi-blinking on');
            if (detectIE()) repeatKBlink();
        }

        function repeatBlink() {
            d3.selectAll(".glow-red-blinking.on").transition().duration(1000).ease("ease-in-out").style("fill", "hsl(0, 100%, 10%)").transition().duration(1000).ease("ease-in-out").style("fill", "hsl(0, 100%, 63%)").each("end",repeatBlink);
        }

        function stopBlink() {
            d3.selectAll(".glow-red-blinking").transition().duration(0).style('fill', 'hsl(0, 3%, 30%)');
            d3.selectAll(".glow-yellow-blinking").transition().duration(0).style('fill', 'hsl(0, 3%, 30%)');
            d3.selectAll(".glow-gray-blinking").transition().duration(0).style('fill', 'hsl(0, 3%, 30%)');
            d3.selectAll(".glow-green-blinking").transition().duration(0).style('fill', 'hsl(0, 3%, 30%)');
            d3.selectAll(".glow-kavi-blinking").transition().duration(0).style('fill', 'hsl(0, 3%, 30%)');
        }
        function repeatYBlink() {
            d3.selectAll(".glow-yellow-blinking.on").transition().duration(1000).ease("ease-in-out").style("fill", "hsl(33, 100%, 30%)").transition().duration(1000).ease("ease-in-out").style("fill", "hsl(33, 100%, 63%)").each("end",repeatYBlink);
        }
        function repeatGBlink() {
            d3.selectAll(".glow-gray-blinking.on").transition().duration(1000).ease("ease-in-out").style("fill", "hsl(0, 3%, 30%)").transition().duration(1000).ease("ease-in-out").style("fill", "hsl(0, 3%, 63%)").each("end",repeatGBlink);
        }
        function repeatGnBlink() {
            d3.selectAll(".glow-green-blinking.on").transition().duration(1000).ease("ease-in-out").style("fill", "hsl(134, 82%, 20%)").transition().duration(1000).ease("ease-in-out").style("fill", "hsl(134, 82%, 53%)").each("end",repeatGnBlink);
        }
        function repeatKBlink() {
            d3.selectAll(".glow-kavi-blinking.on").transition().duration(1000).ease("ease-in-out").style("fill", "hsl(21, 99%, 30%)").transition().duration(1000).ease("ease-in-out").style("fill", "hsl(21, 99%, 63%)").each("end",repeatKBlink);
        }

        function processVariance(g, v) {
            if (v == 100) groupGoGreen(g);
            else if (v >=1) groupGoYellow(g);
            else if (v ==0) groupGoRed(g);
            else groupGoGrey(g);
        }
        if($(window).width() > 1900){
            $("#svg-container").css({
                "transform": "translate(0px, 10.003px) rotate(0rad) skewX(0rad) scale(1.34545, 1.34545)",
                "transform-origin": "705px 0px 0px"

            });
        } else if($(window).width() > 1700){
            $("#svg-container").css({
                "transform": "translate(0px, 10.003px) rotate(0rad) skewX(0rad) scale(1.2545, 1.2545)",
                "transform-origin": "666px 0px 0px"

            });
        } else if($(window).width() > 1600){
            $("#svg-container").css({
                "transform": "translate(0px, 10.003px) rotate(0rad) skewX(0rad) scale(1.2145, 1.2145)",
                "transform-origin": "666px 0px 0px"

            });

        } else if($(window).width() > 1500){
            $("#svg-container").css({
                "transform": "translate(0px, 10.003px) rotate(0rad) skewX(0rad) scale(1.07145, 1.07145)",
                "transform-origin": "805px 0px 0px"

            });
        } else if($(window).width() > 1300){
            $("#svg-container").css({
                "transform": "translate(0px, 10.003px) rotate(0rad) skewX(0rad) scale(0.98, 0.98)",
                "transform-origin": "805px 0px 0px"

            });
        }
        //RenderPieChart(that.$el.find("#chart")[0],0)

    }

});
/*
 * .addClassSVG(className)
 * Adds the specified class(es) to each of the set of matched SVG elements.
 */
$.fn.addClassSVG = function(className){
    $(this).attr('class', function(index, existingClassNames) {
        return existingClassNames + ' ' + className;
    });
    return this;
};

/*
 * .removeClassSVG(className)
 * Removes the specified class to each of the set of matched SVG elements.
 */
$.fn.removeClassSVG = function(className){
    $(this).attr('class', function(index, existingClassNames) {
        var re = new RegExp(className, 'g');
        return existingClassNames.replace(re, '');
    });
    return this;
};
$.fn.svgRemover = function(className) {
    $(this).each(function () {
        $(this).attr('class', function (index, classNames) {
            return classNames.replace(className, '');
        });
    });
};
mpxd.modules.signal_train_control_system.overall_progress = Backbone.View.extend({
    initialize: function (options) {
        this.data = options.data;
        this.render();
    },render: function () {
        var that = this;
        var html = mpxd.getTemplate(that.data.type);
        template = _.template(html, {data: that.data});
        that.$el.html(template);
        that.$el.find('.content').mCustomScrollbar({theme: 'rounded'});

    }
});
mpxd.modules.track_works.progress = Backbone.View.extend({
    initialize: function (options) {
        this.data = options.data;
        this.render();
    },render: function () {
        var that = this;
        var html = mpxd.getTemplate("progress");
        var currentProgress = 100;
        var remainingProgress = 100 - currentProgress;
        template = _.template(html, {data: that.data});
        that.$el.html(template);
        that.$el.find('#chart_' + that.data.id).highcharts({
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
                    endAngle: 360,
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
            },
        });
    }
});
function RenderPieChart(elementId, dataList) {
    var currentProgress = dataList;
    var remainingProgress = 100 - currentProgress;
    new Highcharts.Chart({
        chart: {
            renderTo: elementId,
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
            innerSize: '90%',
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
        }],
        credits: {
            enabled: false
        }
    });
}