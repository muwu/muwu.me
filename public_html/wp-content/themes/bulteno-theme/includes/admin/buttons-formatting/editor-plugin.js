/**
 * This file contains all the main JavaScript functionality needed for the editor formatting buttons.
 * 
 * @author orangethemes
 * http://orangethemes.com
 */

/**
 * Define all the formatting buttons with the HTML code they set.
 */
var orangethemesButtons=[
		{
			id:'orangethemesbutton',
			image:'btn-button.png',
			title:'Button',
			allowSelection:false,
			fields:[{id:'text', name:'Text'},{id:'href', name:'Link URL'},{id:'color', name:'Color', colorpalette:true},{id:'textcolor', name:'Text Color', colorpalette:true},{id:'target', name:'Target', values:['Self', 'Blank']},{id:'size', name:'Size', values:['Small', 'Medium', 'Huge']}],
			generateHtml:function(obj){
				
				
				var buttonTarget=obj.target==='Self'?'':'blank';


				return '[button link="'+obj.href+'" target="'+buttonTarget+'" color="'+obj.color.toLowerCase()+'" textcolor="'+obj.textcolor.toLowerCase()+'" size="'+obj.size.toLowerCase()+'"]'+obj.text+'[/button]';

			}
		},		
		{
			id:'orangethemessocial',
			image:'cpanel-btn-social.png',
			title:'Social Icon',
			allowSelection:false,
			fields:[{id:'icon', name:'Type', values:['Twitter', 'Facebook', 'Google+', 'Pinterest', 'Tumbrl', 'Flickr', 'Vimeo', 'Skype', 'Linkedin']},{id:'link', name:'Link To Account'}],
			generateHtml:function(obj){
				
					switch(obj.icon.toLowerCase()) {
						case 'twitter':
							var code='62218'
							break;
						case 'facebook':
							var code='62221'
							break;
						case 'google+':
							var code='62224'
							break;
						case 'pinterest':
							var code='62227'
							break;
						case 'tumbrl':
							var code='62230'
							break;
						case 'flickr':
							var code='62212'
							break;
						case 'vimeo':
							var code='62215'
							break;
						case 'skype':
							var code='62266'
							break;
						case 'linkedin':
							var code='62233'
							break;
						
					}


				return '[social link="'+obj.link+'" icon="'+code+'"]';

			}
		},	
		{
			id:'orangethemesspacer',
			image:'btn-spacer.png',
			title:'Spacer',
			allowSelection:false,
			fields:[{id:'style', name:'Style', values:['Spacer 1', 'Spacer 2', 'Spacer 3', 'Spacer 4', 'Spacer 5', 'Spacer 6']}],
			generateHtml:function(obj){
			
				switch(obj.style)
				{
					case 'Spacer 1':
					  var spacerStyle='1'
					  break;
					case 'Spacer 2':
					  var spacerStyle='2'
					  break;
					case 'Spacer 3':
					  var spacerStyle='3'
					  break;
					case 'Spacer 4':
					  var spacerStyle='4'
					  break;
					case 'Spacer 5':
					  var spacerStyle='5'
					  break;
					case 'Spacer 6':
					  var spacerStyle='6'
					  break;
					default:
					  var spacerStyle='1'
				}

				return '[spacer style="'+spacerStyle+'"]';

			}
		},
		{
			id:'orangethemesvideo',
			image:'cpanel-btn-video.png',
			title:'Insert Video',
			allowSelection:false,
			fields:[{id:'links', name:'Youtube Video Link' }],
			generateHtml:function(obj){
				return '[video url="'+obj.links+'"]';
			}
		},
		{
			id:'orangethemesquote',
			image:'btn-quotes.png',
			title:'Quote',
			allowSelection:false,
			fields:[{id:'style', name:'Style', values:['Style 1', 'Style 2']},{id:'quotetext', name:'Quote text', textarea:true}],
			generateHtml:function(obj){
			
				if(obj.style.toLowerCase()=="default"){
					return '[blockquote]'+obj.quotetext+'[/blockquote]';
				} else {
					return '[blockquote style="'+obj.style.toLowerCase()+'"]'+obj.quotetext+'[/blockquote]';
				}
				

			}
		},
		{
			id:'orangethemesmap',
			image:'map-icon.png',
			title:'Gogole Map',
			allowSelection:false,
			fields:[{id:'link', name:'Google Map URL'}],
			generateHtml:function(obj){
				return '[googlemap]'+obj.link+'[/googlemap]';
			}
		},

		{
			id:'orangethemeslists',
			image:'btn-lists.png',
			title:'Lists',
			allowSelection:false,
			fields:[{id:'type-1', name:'Type', values:['Cog', 'Star', 'Check', 'User', 'Pencil', 'Phone', 'Location', 'Mail', 'Megaphone', 'Thumbs-up', 'Thumbs-down', 'Camera', 'Globe', 'Heart', 'Music', 'Brush', 'PopUp']},{id:'lists', name:'Text', lists:true}],
			generateHtml:function(obj){
				var x = jQuery('#ot-lists').val();  
				var output = '[list]';
				for(e = 1; e <= x; e++) {
					switch(jQuery('#orangethemes-shortcode-type-'+e).val().toLowerCase()) {
						case 'cog':
							var code='9881'
							break;
						case 'star':
							var code='9733'
							break;
						case 'check':
							var code='10003'
							break;
						case 'user':
							var code='128100'
							break;
						case 'pencil':
							var code='9998'
							break;
						case 'phone':
							var code='128222'
							break;
						case 'location':
							var code='59172'
							break;
						case 'mail':
							var code='9993'
							break;
						case 'megaphone':
							var code='128227'
							break;
						case 'thumbs-up':
							var code='128077'
							break;
						case 'thumbs-down':
							var code='128078'
							break;
						case 'camera':
							var code='128247'
							break;
						case 'globe':
							var code='127758'
							break;
						case 'music':
							var code='9835'
							break;
						case 'heart':
							var code='hearts'
							break;
						case 'brush':
							var code='59290'
							break;
						case 'popup':
							var code='59212'
							break;
					}
				
				
					output+= '[item icon="'+code+'" ]';
					output+= jQuery('#orangethemes-shortcode-lists-'+e).val();
					output+= '[/item]';
				}
				output+="[/list]";
				
				return output;
			}
		},
		{
			id:'orangethemesgallery',
			image:'btn-gallery.png',
			title:'Insert Gallery Preview',
			allowSelection:false,
			fields:[{id:'links', name:'Gallery Link' }],
			generateHtml:function(obj){
				return '[gallery url="'+obj.links+'"]';
			}
		},
		{
			id:'orangethemescaption',
			image:'btn-image.png',
			title:'Image Caption',
			allowSelection:false,
			fields:[{id:'caption_title', name:'Title'},{id:'link', name:'Image URL'}],
			generateHtml:function(obj){
				return '[caption title="'+obj.caption_title+'" url="'+obj.link+'"]';
			}
		},
		{
			id:'orangethemesbreak',
			image:'cpanel-btn-break.png',
			title:'Insert Breake',
			allowSelection:false,
			generateHtml:function(){
				return '<br class="clear" />';
			}
		},
		{
			id:'orangethemestabs',
			image:'btn-tabs.png',
			title:'Insert Tabs',
			allowSelection:false,
			fields:[{id:'title-1', name:'Title: '},{id:'text', name:'Text: ', tabs:true}],
			generateHtml:function(obj){
				var x = jQuery('#ot-tabs').val();  
				var output = '[tabs ';
				for(e = 1; e <= x; e++) {
					output+= 'title'+e+'="'+jQuery('#orangethemes-shortcode-title-'+e).val()+'" ';
					output+= 'text'+e+'="'+jQuery('#orangethemes-shortcode-text-'+e).val()+'" ';
				}
				output+="]";
				
				return output;
			}
		},

		{
			id:'orangethemesparagraph',
			image:'btn-paragraph-2.png',
			title:'Insert Paragraph',
			allowSelection:false,
			generateHtml:function(obj){
				return '[doubleparagraphleft] Left Side Content [/doubleparagraphleft][doubleparagraphright] Right Side Content [/doubleparagraphright]';
			}
		},
		{
			id:'orangethemesparagraph2',
			image:'btn-paragraph-3.png',
			title:'Insert Paragraph',
			allowSelection:false,
			generateHtml:function(obj){
				return '[thirdparagraphright] Left Side Content [/thirdparagraphright][thirdparagraphcenter] Middle Content [/thirdparagraphcenter][thirdparagraphleft] Right Side Content [/thirdparagraphleft]';
			}
		}
		
];

/**
 * Contains the main formatting buttons functionality.
 */
orangethemesButtonManager={
	dialog:null,
	idprefix:'orangethemes-shortcode-',
	ie:false,
	opera:false,
		
	/**
	 * Init the formatting button functionality.
	 */
	init:function(){
			
		var length=orangethemesButtons.length;
		for(var i=0; i<length; i++){
		
			var btn = orangethemesButtons[i];
			orangethemesButtonManager.loadButton(btn);
			
		}
		
		if ( jQuery.browser.msie ) {
			orangethemesButtonManager.ie=true;
		}
		
		if (jQuery.browser.opera){
			orangethemesButtonManager.opera=true;
		}
		
	},
	
	/**
	 * Loads a button and sets the functionality that is executed when the button has been clicked.
	 */
	loadButton:function(btn){
		
		tinymce.create('tinymce.plugins.'+btn.id, {
	        init : function(ed, url) {
			        ed.addButton(btn.id, {
	                title : btn.title,
	                image : url+'/buttons/'+btn.image,
	                onclick : function() {
			        	
			           var selection = ed.selection.getContent();
	                   if(btn.allowSelection && selection){
	                	   //modification via selection is allowed for this button and some text has been selected
	                	   selection = btn.generateHtml(selection);
	                	   ed.selection.setContent(selection);
	                   }else if(btn.fields){
	                	   //there are inputs to fill in, show a dialog to fill the required data
	                	   orangethemesButtonManager.showDialog(btn, ed);
	                   }else if(btn.list){
	                	   ed.dom.remove('orangethemescaret');
		           		    ed.execCommand('mceInsertContent', false, '&nbsp;');	
	           			
	                	    //this is a list
	                	    var list, dom = ed.dom, sel = ed.selection;
	                	    
		               		// Check for existing list element
		               		list = dom.getParent(sel.getNode(), 'ul');
		               		
		               		// Switch/add list type if needed
		               		ed.execCommand('InsertUnorderedList');
		               		
		               		// Append styles to new list element
		               		list = dom.getParent(sel.getNode(), 'ul');
		               		
		               		if (list) {
		               			dom.addClass(list, btn.list);
		               		}
	                   }else{
	                	   //no data is required for this button, insert the generated HTML
	                	   ed.execCommand('mceInsertContent', true, btn.generateHtml());
	                   }
					   
					   
	                }
	            });
	        }
	    });
		
	    tinymce.PluginManager.add(btn.id, tinymce.plugins[btn.id]);
	},
	
	/**
	 * Displays a dialog that contains fields for inserting the data needed for the button.
	 */
	showDialog:function(btn, ed){

		
		if(orangethemesButtonManager.ie){
			ed.dom.remove('orangethemescaret');
		    var caret = '<div id="orangethemescaret">&nbsp;</div>';
		    ed.execCommand('mceInsertContent', false, caret);	
			var selection = ed.selection;
		}
	    
		var html='<div>';
		for(var i=0, length=btn.fields.length; i<length; i++){
			var field=btn.fields[i], inputHtml='';
			if(btn.fields[i].colorpalette){
					//this field should be a text area
					inputHtml='<input type="text" class="color" value="'+btn.fields[i].color+'" id="'+orangethemesButtonManager.idprefix+btn.fields[i].id+'">';
			} else if(btn.fields[i].values){
				//this is a select list
				inputHtml='<select id="'+orangethemesButtonManager.idprefix+btn.fields[i].id+'">';
				jQuery.each(btn.fields[i].values, function(index, value){
					inputHtml+='<option value="'+value+'">'+value+'</option>';
				});
				inputHtml+='</select>';
			}else{
				if(btn.fields[i].textarea && !orangethemesButtonManager.opera){
					//this field should be a text area
					inputHtml='<textarea id="'+orangethemesButtonManager.idprefix+btn.fields[i].id+'" ></textarea>';
				} else if(btn.fields[i].unlimitedinput && !orangethemesButtonManager.opera){ 
					// unlimited input
					inputHtml='<input type="text" class="otlist" id="'+orangethemesButtonManager.idprefix+btn.fields[i].id+'-1" /><input type="text" id="ot-list" value="1" hidden /><br /><br /><strong>To add new field press Enter</strong>';
				} else if(btn.fields[i].lists && !orangethemesButtonManager.opera){ 
					// unlimited input
					inputHtml='<input type="text" class="lists" id="'+orangethemesButtonManager.idprefix+btn.fields[i].id+'-1" /><input type="text" id="ot-lists" value="1" hidden /><br /><br /><strong>To add new field press Enter</strong>';
				} else if(btn.fields[i].tabs && !orangethemesButtonManager.opera){ 
					// unlimited input
					inputHtml='<textarea id="'+orangethemesButtonManager.idprefix+btn.fields[i].id+'-1"  class="tabs" ></textarea><input type="text" id="ot-tabs" value="1" hidden /><br /><br /><strong>To add new field press Enter</strong>';
				}else{
					//this field should be a normal input
					inputHtml='<input type="text" id="'+orangethemesButtonManager.idprefix+btn.fields[i].id+'" />';
				}
			}
			html+='<div class="orangethemes-shortcode-field"><label>'+btn.fields[i].name+'</label>'+inputHtml+'</div>';
		}
		html+='<a href="" id="insertbtn" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" role="button"><span class="ui-button-text">Insert</span></a></div>';
				
		var dialog = jQuery(html).dialog({
							 title:btn.title, 
							 modal:true,
							 close:function(event, ui){
								jQuery(this).html('').remove();
							 }
							 });
		
		orangethemesButtonManager.dialog=dialog;
		
		//set a click handler to the insert button
		dialog.find('#insertbtn').click(function(event){
			event.preventDefault();
			orangethemesButtonManager.executeCommand(ed,btn,selection);
		});

			dialog.keyup(function(){
			  if(event.keyCode == 13 && jQuery(".otlist").is(":focus")) {
				var i = jQuery('#ot-list').val();
				var n = Number(i)+Number(1);
				jQuery('<input type="text" class="otlist" id="orangethemes-shortcode-list-'+n+'" />').insertAfter("#orangethemes-shortcode-list-"+i);    
				jQuery('#ot-list').val(n);
			  }
			});
			
			dialog.keyup(function(){
			  if(event.keyCode == 13 && jQuery(".tabs").is(":focus") && jQuery('#ot-tabs').val() <5) {
				var i = jQuery('#ot-tabs').val();
				var n = Number(i)+Number(1);
				jQuery('<div class="orangethemes-shortcode-field"><label>Title: </label><input type="text" id="orangethemes-shortcode-title-'+n+'"></div><div class="orangethemes-shortcode-field"><label>Text: </label><textarea id="orangethemes-shortcode-text-'+n+'" class="tabs"></textarea></div>').insertBefore("#insertbtn");    
				jQuery('#ot-tabs').val(n);
			  }
			});
			
			dialog.keyup(function(){
			  if(event.keyCode == 13 && jQuery(".lists").is(":focus")) {
				var i = jQuery('#ot-lists').val();
				var n = Number(i)+Number(1);
				jQuery('<div class="orangethemes-shortcode-field"><label>Type</label><select id="orangethemes-shortcode-type-'+n+'"><option value="Cog">Cog</option><option value="Star">Star</option><option value="Check">Check</option><option value="User">User</option><option value="Pencil">Pencil</option><option value="Phone">Phone</option><option value="Location">Location</option><option value="Mail">Mail</option><option value="Megaphone">Megaphone</option><option value="Thumbs-up">Thumbs-up</option><option value="Thumbs-down">Thumbs-down</option><option value="Camera">Camera</option><option value="Globe">Globe</option><option value="Heart">Heart</option><option value="Music">Music</option><option value="Brush">Brush</option><option value="PopUp">PopUp</option></select></div><div class="orangethemes-shortcode-field"><label>Text</label><input type="text" class="lists" id="orangethemes-shortcode-lists-'+n+'"></div>').insertBefore("#insertbtn");    
				jQuery('#ot-lists').val(n);
			  }
			});
		
	},

	/**
	 * Executes a command when the insert button has been clicked.
	 */
	executeCommand:function(ed, btn, selection){

    		var values={}, html='';
    		
    		if(!btn.allowSelection){
    			//the button doesn't allow selection, generate the values as an object literal
	    		for(var i=0, length=btn.fields.length; i<length; i++){
	        		var id=btn.fields[i].id,
	        			value=jQuery('#'+orangethemesButtonManager.idprefix+id).val();
	        		
	    			values[id]=value;
	    		}
	    		html = btn.generateHtml(values);
    		}else{
    			//the button allows selection - only one value is needed for the formatting, so
    			//return this value only (not an object literal)
    			value = jQuery('#'+orangethemesButtonManager.idprefix+btn.fields[0].id).attr("value")
    			html = btn.generateHtml(value);
    		}
    		
    	orangethemesButtonManager.dialog.remove();

    	if(orangethemesButtonManager.ie){
	    	selection.select(ed.dom.select('div#orangethemescaret')[0], false);
	    	ed.dom.remove('orangethemescaret');
    	}

  		ed.execCommand('mceInsertContent', false, html);
    	
	}
};

/**
 * Init the formatting functionality.
 */
(function() {
	
	orangethemesButtonManager.init();
    
})();

