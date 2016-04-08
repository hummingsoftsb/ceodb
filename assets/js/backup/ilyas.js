
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
		
		var pierdata = getPierData([currentSlug]);
		//asdzxc = that.data.data;
		var data = [];
		
		//["V1","DD01","PS3-C","DS39.8N",3.20343,101.58672,"",""]
		
		
		$.each(pierdata, function(idx,i){
		
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
		
		if (lat2 != "") { 
			//Double pier here
				data.push({"pier":{id:pnum,"type":"double","status":pierstatus}, "span":{"type":"double","status":spanstatus}});
			} else {
			//Single pier here	
				data.push({"pier":{id:pnum,"type":"single","status":pierstatus}, "span":{"type":"single","status":spanstatus}});
			}
		});
		

		var margin = {top: -5, right: -5, bottom: -5, left: -5}//,
			
		
		//	height = 500 - margin.top - margin.bottom;
		
		var getdim = function(){
			if (typeof this.width == "undefined") this.width = parseInt($('.piermap').css('width'));
			if (typeof this.height == "undefined") this.height = parseInt($('.piermap').css('height'));
			return [this.width,this.height];
		}
		
			
		var zoomed = function() {
			/* Logic is flawed. Please rewrite constraint whenever have time */
			var t = d3.event.translate,
				s = d3.event.scale,
				dim = getdim(),
				width = dim[0],
				height = dim[1],
				rightConstraint = width - (t[0]/(1-s));
			
			rightConstraint = (isFinite(rightConstraint) ? rightConstraint : t[0]);
			
			t[0] = Math.min(50, t[0]); /* Left constraint */
			t[1] = Math.min(50, t[1]); /* Top constraint */
			
			/*if (typeof this.lastt == "undefined") {console.log("lastt"); this.lastt = t;}
			
			if (rightConstraint <= -50) {
				t[0] = this.lastt[0]; 
			} else {
				this.lastt = t;
			}
			//zoom.translate(t);
			
			console.log(t[0], rightConstraint, this.lastt);
			//console.log(t[0]/s + width);
			console.log();*/
		  container.attr("transform", "translate(" + d3.event.translate + ")scale(" + d3.event.scale + ")");
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
			.scale(0.7)
			.scaleExtent([0.6, 10])
			.on("zoom", zoomed)
			
		

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
		  .append("g")
			.attr("transform", "translate(" + 50 + "," + 50 + ")")
			.call(zoom)
			.on("dblclick.zoom", null)
			
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
			.attr("transform","scale(0.7)");
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
		
		
		var gotoSingle = function(id,phead,pier_l,pcap_l,pile_l){
			/* Last week data is not in yet! */
			location.href="singlepiers?d={0},{1},{2},{3},{4},{5},{6},{7},{8}".format(id,phead,pier_l,pcap_l,pile_l,0,0,0,0);
		}
		var gotoDouble = function(id,phead,pier_l,pcap_l,pile_l,pier_r,pcap_r,pile_r){
			/* Last week data is not in yet! */
			console.log(pile_r);
			location.href="doublepiers?d={0},{1},{2},{3},{4},{5},{6},{7},{8},{9},{10},{11},{12},{13},{14}".format(id,phead,pier_l,pcap_l,pile_l,pier_r,pcap_r,pile_r,0,0,0,0,0,0,0)
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

		var addSinglePier = function(id, xy, d) {
			var phead = 0;
			var pier_l = 0;
			var pcap_l = 0;
			var pile_l = 0;
			
			if (typeof d != "undefined") {
				phead = d[0];
				pier_l = d[1];
				pcap_l = d[2];
				pile_l = d[3];
			}
			
			var pier = container.append("g")
			.attr("id","pier"+id)
			.attr("transform","translate("+xy.join(',')+") scale(0.1)")
			.attr("class","piergroup singlepier")
			.style("pointer-events", "all")
			.on("dblclick",function(){gotoSingle(id,phead,pier_l,pcap_l,pile_l)})
			
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
			
		var addDoublePier = function(id, xy, d) {
			var phead = 0;
			var pier_l = 0;
			var pcap_l = 0;
			var pile_l = 0;
			var pier_r = 0;
			var pcap_r = 0;
			var pile_r = 0;
			
			if (typeof d != "undefined") {
				phead = d[0];
				pier_l = d[1];
				pcap_l = d[2];
				pile_l = d[3];
				pier_r = d[4];
				pcap_r = d[5];
				pile_r = d[6];
			}
			
			pier = container.append("g")
			.attr("id","pier"+id)
			.attr("transform","translate("+xy.join(',')+") scale(0.1)")
			.attr("class","piergroup doublepier")
			.on("dblclick",function(){gotoDouble(id,phead,pier_l,pcap_l,pile_l,pier_r,pcap_r,pile_r)});
			
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
			.style("fill", getItsColor(pile_l))
			.attr("width","41.911671")
			.attr("height","119.81321")
			.attr("x","51.235119")
			.attr("y","932.02399")
			pilingg_r.append("svg:rect")
			.style("stroke-width",10.2)
			.style("stroke", "#000000")
			.style("fill", getItsColor(pile_l))
			.attr("width","41.911671")
			.attr("height","119.81321")
			.attr("x","129.20053")
			.attr("y","932.02399")
			pilingg_r.append("svg:rect")
			.style("stroke-width",10.2)
			.style("stroke", "#000000")
			.style("fill", getItsColor(pile_l))
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
		var scale = 0.7;
		var width = (dim[0]/scale) - ((dim[0]/scale) % blockwidth);
		var clevel = 0;
		var levelheight = 180;

		for (var i = 0; i < data.length; i++) {
			//7 Spaces in between piers & double piers
			var current = data[i];
			var xpad = 10;
			var ypad = 10;
			
			var id = zfill1(i, 4);
			var x = (xpad + (blockwidth*i)) % width;
			clevel = Math.floor((blockwidth/width)*i);
			var y = ypad + (levelheight*clevel) + 10;
			
			if (typeof current.pier.type != "undefined") {
				if (current.pier.type == "single") {
					addSinglePier(current.pier.id, [x + 30, y + 30], current.pier.status);
				} else{
					addDoublePier(current.pier.id, [x, y + 30], current.pier.status);
				}
			}
			
			
			if (typeof current.span.type != "undefined") {
				if (current.span.type == "single") {
					addSingleSpan(current.pier.id, [x, y], current.span.status);
				} else {
					addDoubleSpan(current.pier.id, [x, y], current.span.status);
				}
			}
			//addDoublePier(i, [160*i, 40])
			//addDoubleSpan(i, [160*i, 10])
		}
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
            }, /*
             subtitle: {
             text: 'Source: WorldClimate.com',
             x: -20
             },*/
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
                renderTo: 'chart_' + that.data.id,
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
        this.render();
    },
    render: function() {
        var that = this;
        var html = mpxd.getTemplate("scurve-2");

        template = _.template(html, {data: that.data});
        that.$el.html(template);
        that.$el.find('.content').mCustomScrollbar({theme: 'rounded'});
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
                    enableMouseTracking: false,
                }, {
                    name: 'Late',
                    data: that.data.delayedData,
                    color: '#0070C0',
                    enableMouseTracking: false,
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
                renderTo: 'chart_' + that.data.id,
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
    //console.log(data);
    var s = mpxd.modules.scurve;
    s.initializeScurve(function() {
        s.GenerateScurve(data.data);
    });

}




mpxd.modules.scurve.GenerateScurve = function(items) {
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


    if (type == "long") {
        data.categories = ["Jan/12", "Feb/12", "Mar/12", "Apr/12", "May/12", "Jun/12", "Jul/12", "Aug/12", "Sep/12", "Oct/12", "Nov/12", "Dec/12", "Jan/13", "Feb/13", "Mar/13", "Apr/13", "May/13", "Jun/13", "Jul/13", "Aug/13", "Sep/13", "Oct/13", "Nov/13", "Dec/13", "Jan/14", "Feb/14", "Mar/14", "Apr/14", "May/14", "Jun/14", "Jul/14", "Aug/14", "Sep/14", "Oct/14", "Nov/14", "Dec/14", "Jan/15", "Feb/15", "Mar/15", "Apr/15", "May/15", "Jun/15", "Jul/15", "Aug/15", "Sep/15", "Oct/15", "Nov/15", "Dec/15", "Jan/16", "Feb/16", "Mar/16", "Apr/16", "May/16", "Jun/16", "Jul/16", "Aug/16", "Sep/16", "Oct/16", "Nov/16", "Dec/16", "Jan/17", "Feb/17", "Mar/17", "Apr/17", "May/17", "Jun/17", "Jul/17"];
    } else if (type == "short") {
        data.categories = ["Jan-12", "Apr-12", "Jul-12", "Oct-12", "Jan-13", "Apr-13", "Jul-13", "Oct-13", "Jan-14", "Apr-14", "Jul-14", "Oct-14", "Jan-15", "Apr-15", "Jul-15", "Oct-15", "Jan-16", "Apr-16", "Jul-16", "Oct-16", "Jan-17", "Apr-17", "Jul-17"];
        //data.categories = ["Jan-12", "Apr-12", "Jul-12", "Oct-12", "Jan-13", "Apr-13", "Jul-13", "Oct-13", "Jan-14", "Apr-14", "Jul-14", "Oct-14", "Jan-15", "Apr-15", "Jul-15", "Oct-15", "Jan-16", "Apr-16", "Jul-16", "Oct-16", "Jan-17", "Apr-17", "Jul-17"];
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
        return new mpxd.modules.scurve.ScurveView2({data: data, el: el});
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
	History.pushState({p:reallink}, "Pushstate", parsedlink);
	}
	//console.log("Pushstate!!");
	
	
	
    //if (
    var currentRoute = p;
    var currentPageID = pages_lookup_url[p].id;
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
				datelist.append("<li><a href=# onClick=loadPage('"+p+"')>"+date+ " (Latest)</a></li>");
			else
				datelist.append("<li><a href=# onClick=loadPage('"+p+"?date="+date+"')>"+date+"</a></li>");
			
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
		
		//ellipseTitle(title +" ("+ moment(curr_data_date, "DD-MMM-YY").format("DD MMMM YYYY") +")");
		var titletext = title +" ("+ moment(curr_data_date, "DD-MMM-YY").format("DD MMMM YYYY") +")";
		if (!isUseCustomPortlet) ellipseTitle(titletext);
		else $('#page_title').text(titletext);

		    
		
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
	var State = History.getState()
	
	//History.log('initial:', State.data, State.title, State.url);

	// Bind to State Change
	History.Adapter.bind(window,'statechange',function(){ // Note: We are using statechange instead of popstate
		// Log the State
		var State = History.getState(); // Note: We are using History.getState() instead of event.state
		History.log('statechange:', State.data, State.title, State.url);
		
		if (State.title == "Pushstate") { if (typeof State.data.p != "undefined") { loadPage(State.data.p, true);}};
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