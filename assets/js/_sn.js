/*Created : Sebin Thomas
For     : Backbone Constructors, Views and the associated functions
Date    : 14/07/2016*/

mpxd.constructors.page_info_ring = function(data) {
    mpxd.modules.general.GenerateGeneralview(data);
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
        d3.xml("/mpxd/assets/img/systems/stcs/mrt_train_diagram_3.svg", "image/svg+xml", function (error, xml) {

            if (error) throw console.log("error")
            document.getElementById('tc1').appendChild(xml.documentElement);
            var a = document.getElementById('svg4265');
            d3.select("#path4836").style("fill", y[0]);
            d3.select("#path5007").style("fill", y[1]);
            d3.select("#path5009").style("fill", y[1]);
            d3.select("#path4981").style("fill", y[1]);
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

    }
});
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
