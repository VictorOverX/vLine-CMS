/*
	
	HTML Builder front-end version 1.5

*/


/* SETTINGS */

var pageContainer = "#wrap"; //typically no need to change this
var enablePreview = true; //set to off to disable previews

var editableItems = new Array();

editableItems['.frameCover'] = [];
editableItems['.item-list-right li, .item-list-left li, .item-list-center li'] = ['text-align'];
editableItems['.icon'] = ['color', 'font-size', 'opacity'];
editableItems['nav'] = ['background-color', 'color', 'box-shadow'];
editableItems['nav a'] = ['color', 'font-weight', 'text-transform'];
editableItems['nav li'] = ['background-color', 'border-color', 'border-width'];
editableItems['h1'] = ['color', 'font-size', 'background-color', 'font-family', 'margin-bottom', 'margin-top'];
editableItems['h2'] = ['color', 'font-size', 'background-color', 'font-family', 'margin-bottom', 'margin-top'];
editableItems['h3'] = ['color', 'font-size', 'background-color', 'font-family', 'margin-bottom', 'margin-top'];
editableItems['h4'] = ['color', 'font-size', 'background-color', 'font-family', 'margin-bottom', 'margin-top'];
editableItems['h5'] = ['color', 'font-size', 'background-color', 'font-family', 'margin-bottom', 'margin-top'];
editableItems['p'] = ['color', 'font-size', 'background-color', 'font-family'];
editableItems['a.btn, a.download-btn, button.btn, a.goto'] = ['color', 'border-color', 'border-width', 'border-radius', 'font-size', 'background-color'];
editableItems['img'] = ['width', 'height', 'border-top-left-radius', 'border-top-right-radius', 'border-bottom-left-radius', 'border-bottom-right-radius', 'border-color', 'border-style', 'border-width'];
editableItems['.portfolio-list img'] = ['border-top-left-radius', 'border-top-right-radius', 'border-bottom-left-radius', 'border-bottom-right-radius', 'border-color', 'border-style', 'border-width'];
editableItems['.footer a'] = ['color'];
editableItems['header'] = ['background-image', 'background-color', 'background-repeat', 'background-size', 'background-attachment'];
editableItems['section'] = ['background-image', 'background-color', 'background-repeat', 'background-size', 'background-attachment', 'padding-top', 'padding-bottom', 'border-bottom-width', 'border-bottom-color'];
editableItems['footer'] = ['background-image', 'background-color', 'background-repeat', 'background-size'];
editableItems['.types-block .row > div'] = ['background-image', 'background-color', 'background-repeat', 'background-size'];
editableItems['.pricing-table span'] = ['padding-top', 'padding-bottom', 'background-image', 'background-color', 'background-repeat', 'background-size'];
editableItems['.container-half'] = ['background-image', 'background-color', 'background-size', 'background-attachment', 'background-position'];
editableItems['#testimonials-grid .quote, .pricing-table, .pricing-table .stamp, .post, .panel, .panel-heading, .form-container'] = ['color', 'border-color', 'border-width', 'border-radius', 'font-size', 'background-color'];
editableItems['.carousel-control .arrow'] = ['border-radius', 'border-color', 'border-style', 'border-width'];
editableItems['.num-icon'] = ['color', 'background-color', 'border-radius', 'border-color', 'border-width'];

var editableItemOptions = new Array();

editableItemOptions['nav a : font-weight'] = ['light', 'bold'];
editableItemOptions['a.btn : border-radius'] = ['0px', '4px', '10px'];
editableItemOptions['img : border-style'] = ['none', 'dotted', 'dashed', 'solid'];
editableItemOptions['img : border-width'] = ['1px', '2px', '3px', '4px'];
editableItemOptions['h1 : font-family'] = ['default', 'Lato', 'Helvetica', 'Arial', 'Times New Roman'];
editableItemOptions['h2 : font-family'] = ['default', 'Lato', 'Helvetica', 'Arial', 'Times New Roman'];
editableItemOptions['h3 : font-family'] = ['default', 'Lato', 'Helvetica', 'Arial', 'Times New Roman'];
editableItemOptions['h4 : font-family'] = ['default', 'Lato', 'Helvetica', 'Arial', 'Times New Roman'];
editableItemOptions['h5 : font-family'] = ['default', 'Lato', 'Helvetica', 'Arial', 'Times New Roman'];
editableItemOptions['p : font-family'] = ['default', 'Lato', 'Helvetica', 'Arial', 'Times New Roman'];
editableItemOptions['header : background-repeat'] = ['no-repeat', 'repeat', 'repeat-x', 'repeat-y'];
editableItemOptions['header : background-size'] = ['cover', 'auto'];
editableItemOptions['header : background-attachment'] = ['fixed', 'scroll'];
editableItemOptions['section : background-repeat'] = ['no-repeat', 'repeat', 'repeat-x', 'repeat-y'];
editableItemOptions['section : background-size'] = ['cover', 'auto'];
editableItemOptions['section : background-attachment'] = ['fixed', 'scroll'];
editableItemOptions['footer : background-repeat'] = ['no-repeat', 'repeat', 'repeat-x', 'repeat-y'];
editableItemOptions['footer : background-size'] = ['cover', 'auto'];
editableItemOptions['.pricing-table span : background-repeat'] = ['no-repeat', 'repeat', 'repeat-x', 'repeat-y'];
editableItemOptions['.pricing-table span : background-size'] = ['cover', 'auto'];
editableItemOptions['.container-half : background-size'] = ['cover', 'contain', 'auto'];
editableItemOptions['.container-half : background-attachment'] = ['fixed', 'scroll'];
editableItemOptions['.container-half : background-position'] = ['top', 'right', 'bottom', 'left', 'left top', 'right top', 'right bottom', 'left bottom'];


var editableContent = ['.editContent', 'p', 'h1', 'h2', 'h3', 'h4', 'h5', '.navbar a', 'button', 'a.btn', 'a.download-btn', '.footer a', '.tableWrapper', '.filter a', '.quote small', '.quote span', '.pricing-table span', '.benefits-list', '.data-list', '.links-list', '.post-desc', '.post-info', '.widget li a', '.tags', '.panel-body', 'td', 'th', '.num-icon'];


/* FLAT UI PRO INITS */

$(function(){

	// Tabs
	$(".nav-tabs a").on('click', function (e) {
	  e.preventDefault();
	  $(this).tab("show");
	})

})


/* END SETTINGS */
    
var mainMenuWidth = 230;
var secondMenuWidth = 300;

//local storage check
if(typeof(Storage) !== "undefined") {
    
	localStorage = true;
	
} else {
    
	localStorage = false;
	
}

$( window ).load(function() {
	
	$('#loader').fadeOut(function(){
		
		$('#menu').animate({'left': '-190px'}, 1000);
		
	});
	
	
	//activate previews?
	if( enablePreview == true ) {
		
		$('#preview').show();
		
	}
	
	//do we have saved pages?
	
	if( localStorage.getItem("blocksElement1") !== null ) {

		$('#start').hide()	
		
	}
	
	var framesForLater = [];
	
	for(x=0; x<=99; x++) {
	
		if( localStorage.getItem("blocksElement"+x) !== null && localStorage.getItem("blocksFrame"+x) !== null ) {
		
			//alert('')
			//localStorage.removeItem("page"+x);
			
			var blocksElement = JSON.parse(localStorage["blocksElement"+x]);
			var blocksFrame = JSON.parse(localStorage["blocksFrame"+x]);
			var pageNames = JSON.parse(localStorage["pageNames"]);
			
			//does the parent UL exist?
			
			if( $('ul#page'+x).size() == 0 ) {
				
				newUL = $('<ul id="page'+x+'"></ul>');
				
				$('#pageList').append(newUL);
				    	
		    	makeSortable( newUL );
						
			}
			
			for(var y=0; y<=blocksElement.length; y++) {
				
				if( blocksElement[y] != null ) {
														
					//build 'em
					
					toInsert = $("<li>"+blocksElement[y]+"</li>");
					
					toInsert.find('iframe').attr('id', 'ui-id-'+x+y);
					toInsert.find('.frameCover').show();
					
					//sandbox? if so, create the sanboxed frame
					var attr = toInsert.find('iframe').attr('data-sandbox');
			
					if (typeof attr !== typeof undefined && attr !== false) {
						
						theiFrame = toInsert.find('iframe');
					
						theID = theiFrame.attr('data-sandbox');
					
						sandboxedFrame = $('<iframe src="'+theiFrame.attr('src')+'" id="'+theID+'" sandbox="allow-same-origin"></iframe>');
					
						$('#sandboxes').append( sandboxedFrame );
						
					}
					
					
					framesForLater[toInsert.find('iframe').attr('id')] = blocksFrame[y];
															
					toInsert.find('iframe').load(function(){
																														
						$(this).contents().find(pageContainer).html( framesForLater[$(this).attr('id')] );
						
						//sandbox
						
						var attr = $(this).attr('data-sandbox');
				
						if (typeof attr !== typeof undefined && attr !== false) {
							
							$('iframe#'+$(this).attr('data-sandbox')).contents().find(pageContainer).html( framesForLater[$(this).attr('id')] );
						
							theLoaderFunction = $(this).data('data-loaderfunction');
							
							theiFrame = $(this);
							
							var codeToExecute = "theiFrame[0].contentWindow."+theiFrame.attr('data-loaderfunction')+"()";
							var tmpFunc = new Function(codeToExecute);
							tmpFunc();							
							
						}
												
					})
					
					$('ul#page'+x).append( toInsert );
					
					//page links
											
				}
				
			}
			
			if( x >= 1 && pageNames[x] != undefined) {
				
				newLI = $('<li><a class="plink" href="#'+pageNames[x]+'">'+pageNames[x]+'</a><span class="pageButtons"><a class="fileEdit" href=""><span class="fui-new"></span></a><a class="fileDel" href=""><span class="fui-cross"></span></a><a href="#" class="btn btn-xs btn-primary btn-embossed fileSave"><span class="fui-check"></span></a></span></li>');
				
				$('ul#pages').append( newLI );
				
			}
			
			//localStorage.removeItem("blocksElement"+x);
			//localStorage.removeItem("blocksFrame"+x);
		
		}
	}
	
	allEmpty();
	
	
});


var hexDigits = new Array("0","1","2","3","4","5","6","7","8","9","a","b","c","d","e","f"); 

//Function to convert hex format to a rgb color
function rgb2hex(rgb) {
	rgb = rgb.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);
 	return "#" + hex(rgb[1]) + hex(rgb[2]) + hex(rgb[3]);
}

function hex(x) {
  	return isNaN(x) ? "00" : hexDigits[(x - x % 16) / 16] + hexDigits[x % 16];
}

function getRandomArbitrary(min, max) {
    return Math.floor(Math.random() * (max - min) + min);
}

var pendingChanges = false;

function setPendingChanges(v) {

	if( v == true ) {
				
		$('#savePage .bLabel').text("Save changes (!)");
		
		pendingChanges = true;
	
	} else {
	
		$('#savePage .bLabel').text("Nothing new to save");
		
		pendingChanges = false;
	
	}

}

function pageEmpty() {

	if( $('#pageList ul:visible > li').size() == 0 ) {
	
		$('#start').show();
		
		$('#frameWrapper').addClass('empty');
	
	} else {
	
		$('#start').hide();
		
		$('#frameWrapper').removeClass('empty');
	
	}

}

function allEmpty() {

	var allEmpty = false;
	
	if( $('#pageList li').size() == 0 ) {
	
		allEmpty = true;
	
	} else {
	
		allEmpty = false;
	
	}
	
	if( allEmpty ) {
	
		$('a.actionButtons').each(function(){
		
			$(this).addClass('disabled');
		
		});
		
		$('header .modes input').each(function(){
		
			$(this).prop('disabled', true).parent().addClass('disabled');
		
		});
	
	} else {
	
		$('header .modes input').each(function(){
		
			$(this).prop('disabled', false).parent().removeClass('disabled');
		
		});
		
		$('a.actionButtons').each(function(){
		
			$(this).removeClass('disabled');
		
		});
	
	}
	
}


function makeDraggable(theID) {

	$('#second #elements li').each(function(){
	
		$(this).draggable({
			helper: function() {
				return $('<div style="height: 100px; width: 300px; background: #fafafa; box-shadow: 1px 1px 1px rgba(0,0,0,0.15); text-align: center; line-height: 100px; font-size: 28px; color: #00baff"><span class="fui-list"></span></div>');
			},
			revert: 'invalid',
			appendTo: 'body',
			connectToSortable: theID,
			stop: function(){
				
				pageEmpty();
				
				allEmpty();
				
			},
			start: function(){
			
				//switch to block mode
				$('input:radio[name=mode]').parent().addClass('disabled');
				$('input:radio[name=mode]#modeBlock').radio('check');
				
				//show all iframe covers and activate designMode
				
				$('#pageList ul .zoomer-wrapper .zoomer-cover').each(function(){
				
					$(this).show();
				
				})
				
				//deactivate designmode
				
				$('#pageList ul li iframe').each(function(){
				
					this.contentDocument.designMode = "off";
				
				})
			
			}
		});	
	
	})
	
	$('#elements li a').each(function(){
	
		$(this).unbind('click').bind('click', function(e){
		
			e.preventDefault();
		
		})
	
	})

}

var frameContents = '';//holds frame contents

function makeSortable(el) {

	el.sortable({
		revert: true,
		placeholder: "drop-hover",
		handle: ".frameCover",
		beforeStop: function(event, ui){
			
									
			if( ui.item.find('.frameCover').size() == 0 ) {
											
				if( ui.item.find('iframe').size() > 0 ) {//iframe thumbnails
			   				
					theHeight = ui.item.height();
												
					var attr = ui.item.find('iframe').attr('data-sandbox');
				
					if (typeof attr !== typeof undefined && attr !== false) {
						
						//sandboxed
						
						theID = getRandomArbitrary(10000, 1000000000);
						
						sandboxedFrame = $('<iframe src="'+ui.item.find('iframe').attr('src')+'" id="'+theID+'" sandbox="allow-same-origin"></iframe>');
						
						$('#sandboxes').append( sandboxedFrame );
						
						if (typeof ui.item.find('iframe').attr('data-loaderfunction') !== typeof undefined && ui.item.find('iframe').attr('data-loaderfunction') !== false) {
							loaderFunction_ = 'data-loaderfunction="'+ui.item.find('iframe').attr('data-loaderfunction')+'"';
						}
											
						ui.item.html('<iframe src="'+ui.item.find('iframe').attr('src')+'" scrolling="no" frameborder="0" data-sandbox="'+theID+'" '+loaderFunction_+'><iframe>');
					
					} else {
				
						ui.item.html('<iframe src="'+ui.item.find('iframe').attr('src')+'" scrolling="no" frameborder="0"><iframe>');
				
					}
					
					ui.item.find('iframe').uniqueId();
					ui.item.find('iframe').height(theHeight+"px");
				
				
				} else {//image thumbnails
				
					theHeight = ui.item.find('img').attr('data-height');
										
					//is this iframe to be sandboxed?
					
					var attr = ui.item.find('img').attr('data-sandbox');
					
					if (typeof attr !== typeof undefined && attr !== false) {
						
						//sandboxed
						
						theID = getRandomArbitrary(10000, 1000000000);
						
						sandboxedFrame = $('<iframe src="'+ui.item.find('img').attr('data-srcc')+'" id="'+theID+'" sandbox="allow-same-origin"></iframe>');
						
						$('#sandboxes').append( sandboxedFrame );
						
						if (typeof ui.item.find('img').attr('data-loaderfunction') !== typeof undefined && ui.item.find('img').attr('data-loaderfunction') !== false) {
							loaderFunction_ = 'data-loaderfunction="'+ui.item.find('img').attr('data-loaderfunction')+'"';
						}
						
						ui.item.html('<iframe src="'+ui.item.find('img').attr('data-srcc')+'" scrolling="no" frameborder="0" data-sandbox="'+theID+'" '+loaderFunction_+'><iframe>');
						
					} else {
						
						ui.item.html('<iframe src="'+ui.item.find('img').attr('data-srcc')+'" scrolling="no" frameborder="0"><iframe>');
						
					}
					
					ui.item.find('iframe').uniqueId();
					ui.item.find('iframe').height(theHeight+"px");
					ui.item.find('iframe').css('background', '#ffffff url(images/loading.gif) 50% 50% no-repeat');
										
					ui.item.find('iframe').load(function(){
					
						heightAdjustment( ui.item.find('iframe').attr('id'), true );
					
					})
									
				}
				
				//add a delete button
				delButton = $('<button type="button" class="btn btn-danger deleteBlock"><span class="fui-trash"></span> remove</button>');
				resetButton = $('<button type="button" class="btn btn-warning resetBlock"><i class="fa fa-refresh"></i> reset</button>');
				htmlButton = $('<button type="button" class="btn btn-inverse htmlBlock"><i class="fa fa-code"></i> source</button>');
				
				frameCover = $('<div class="frameCover"></div>');
				
				frameCover.append( delButton );
				frameCover.append( resetButton );
				frameCover.append( htmlButton );
				
				ui.item.append( frameCover );
							
			} else {
				
				//sorted
				
				ui.item.find('iframe').load(function(){
					
					$(this).contents().find( pageContainer ).html( frameContents )
					
				})
				
			}
			
			setPendingChanges(true)
			   			
		},
		stop: function(){
			
			$('#pageList ul:visible li').each(function(){
			
				$(this).find('.zoomer-cover > a').remove();
				
			});
						
		},
		start: function(event, ui){
			
			if( ui.item.find('.frameCover').size() != 0 ) {
			
				frameContents = ui.item.find('iframe').contents().find( pageContainer ).html();
						
			}
			
		},
		over: function(){
			
			$('#start').hide();
			
		}
	});

}


function buildeStyleElements(el, theSelector) {

	for( x=0; x<editableItems[theSelector].length; x++ ) {
			
		//create style elements
				
		//alert( $(el).get(0).tagName )
				
		newStyleEl = $('#styleElTemplate').clone();
				
		newStyleEl.attr('id', '');
		newStyleEl.find('.control-label').text( editableItems[theSelector][x]+":" );
				
		if( theSelector+" : "+editableItems[theSelector][x] in editableItemOptions) {//we've got a dropdown instead of open text input
					
			//alert( theSelector+" "+editableItems[kkey][x] )
					
			newStyleEl.find('input').remove();
					
			newDropDown = $('<select></select>');
			newDropDown.attr('name', editableItems[theSelector][x]);
					
			for( z=0; z<editableItemOptions[ theSelector+" : "+editableItems[theSelector][x] ].length; z++ ) {
					
				newOption = $('<option value="'+editableItemOptions[theSelector+" : "+editableItems[theSelector][x]][z]+'">'+editableItemOptions[theSelector+" : "+editableItems[theSelector][x]][z]+'</option>');
						
						
				if( editableItemOptions[theSelector+" : "+editableItems[theSelector][x]][z] == $(el).css( editableItems[theSelector][x] ) ) {
						
					//current value, marked as selected
					newOption.attr('selected', 'true')
						
				}
						
					
				newDropDown.append( newOption )
						
			}
					
			newStyleEl.append( newDropDown );
					
			newDropDown.selectpicker({style: 'btn-sm btn-default', menuStyle: 'dropdown-inverse'});
					
				
		} else {
				
			newStyleEl.find('input').val( $(el).css( editableItems[theSelector][x] ) ).attr('name', editableItems[theSelector][x])
				
			if( editableItems[theSelector][x].indexOf("color") > -1 ) {
						
				//alert( editableItems[theSelector][x]+" : "+$(el).css( editableItems[theSelector][x] ) )
														
				if( $(el).css( editableItems[theSelector][x] ) != 'transparent' && $(el).css( editableItems[theSelector][x] ) != 'none' && $(el).css( editableItems[theSelector][x] ) != '' ) {
					
					newStyleEl.val( $(el).css( editableItems[theSelector][x] ) )
						
				}
					
				newStyleEl.find('input').spectrum({
					preferredFormat: "hex",
					showPalette: true,
					allowEmpty: true,
					showInput: true,
					palette: [
						["#000","#444","#666","#999","#ccc","#eee","#f3f3f3","#fff"],
						["#f00","#f90","#ff0","#0f0","#0ff","#00f","#90f","#f0f"],
						["#f4cccc","#fce5cd","#fff2cc","#d9ead3","#d0e0e3","#cfe2f3","#d9d2e9","#ead1dc"],
						["#ea9999","#f9cb9c","#ffe599","#b6d7a8","#a2c4c9","#9fc5e8","#b4a7d6","#d5a6bd"],
						["#e06666","#f6b26b","#ffd966","#93c47d","#76a5af","#6fa8dc","#8e7cc3","#c27ba0"],
						["#c00","#e69138","#f1c232","#6aa84f","#45818e","#3d85c6","#674ea7","#a64d79"],
						["#900","#b45f06","#bf9000","#38761d","#134f5c","#0b5394","#351c75","#741b47"],
						["#600","#783f04","#7f6000","#274e13","#0c343d","#073763","#20124d","#4c1130"]
					]
				});
					
			}
					
		}
				
								
				
		newStyleEl.css('display', 'block');
				
				
		$('#styleElements').append( newStyleEl );
		
		
		$('#styleEditor form#stylingForm').height('auto')
			
	}

}

function getParentFrameID(el) {
	
	theID = '';
	
	$('#pageList li:visible iframe').each(function(){

		theBody = $(this).contents().find('body');
		
		if( $.contains( document.getElementById( $(this).attr('id') ).contentWindow.document, el ) ) {
		
			theID = $(this).attr('id');
			
		} 

	})
	
	if( theID != '' ) {
		
		return theID;
		
	}
		
}


function heightAdjustment(el, par) {

	par = typeof par !== 'undefined' ? par : false;

	if( par == false ) {
	
		$('#pageList li:visible iframe').each(function(){
	
			theBody = $(this).contents().find('body');
	
			if( $.contains( document.getElementById( $(this).attr('id') ).contentWindow.document, el ) ) {
			
				frameID = $(this).attr('id');
		
			} 
	
		})
	
		theFrame = document.getElementById(frameID);
	
	} else {
			
		theFrame = document.getElementById(el)
	
	}
	
	//realHeight = theFrame.contentWindow.document.body.offsetHeight;
	
	realHeight = theFrame.contentWindow.document.body.offsetHeight;
	
	//alert(theFrame.contentWindow.document.body.offsetHeight)
						
	$(theFrame).height( realHeight+"px" );
	
	$(theFrame).parent().height( (realHeight)+"px" );
	$(theFrame).next().height( (realHeight)+"px" );
	//$(theFrame).parent().parent().height( (realHeight)+"px" );

}

function hasSandbox(el) {
	
	var attr = $('#'+getParentFrameID( el.get(0) )).attr('data-sandbox');
	
	if (typeof attr !== typeof undefined && attr !== false) {
		
		return attr;
		
	} else {
		
		return false;
		
	}
	
}


var _oldIcon = new Array();


function styleClick(el) {

	theSelector = $(el).attr('data-selector');
	
	$('#editingElement').text( theSelector );

	
	//activate first tab
	$('#detailTabs a:first').click();
	
	
	//hide all by default
	$('a#link_Link').parent().hide();
	$('a#img_Link').parent().hide();
	$('a#icon_Link').parent().hide();
	$('a#video_Link').parent().hide();
	
	
	//is the element an ancor tag?
	if( $(el).prop('tagName') == 'A' || $(el).parent().prop('tagName') == 'A' ) {
		
		$('a#link_Link').parent().show();
				
		if( $(el).prop('tagName') == 'A' ) {
				
			theHref = $(el).attr('href');
		
		} else if( $(el).parent().prop('tagName') == 'A' ) {
			
			theHref = $(el).parent().attr('href');
			
		}
		
		zIndex = 0;
		
		pageLink = false;
		
		//the actual select
		
		$('select#internalLinksDropdown').prop('selectedIndex', 0);
		
		$('select#internalLinksDropdown option').each(function(){
				
			if( $(this).attr('value') == theHref ) {
			
				$(this).attr('selected', true);
				
				zIndex = $(this).index();
			
				pageLink = true;
			
			} 
		
		})
		
		
		//the pretty dropdown
		$('.link_Tab .btn-group.select .dropdown-menu li').removeClass('selected');
		
		$('.link_Tab .btn-group.select .dropdown-menu li:eq('+zIndex+')').addClass('selected');
				
		$('.link_Tab .btn-group.select:eq(0) .filter-option').text( $('select#internalLinksDropdown option:selected').text() )
		
		$('.link_Tab .btn-group.select:eq(1) .filter-option').text( $('select#pageLinksDropdown option:selected').text() )
		
		if( pageLink == true ) {
		
			$('input#internalLinksCustom').val('');
		
		} else {
		
			if( $(el).prop('tagName') == 'A' ) {
		
				if( $(el).attr('href')[0] != '#' ) {
					$('input#internalLinksCustom').val( $(el).attr('href') )
				} else {
					$('input#internalLinksCustom').val( '' )
				}
			
			} else if( $(el).parent().prop('tagName') == 'A' ) {
				
				if( $(el).parent().attr('href')[0] != '#' ) {
					$('input#internalLinksCustom').val( $(el).parent().attr('href') )
				} else {
					$('input#internalLinksCustom').val( '' )
				}
				
			}
		}
		
		
		//list available blocks on this page, remove old ones first
		
		$('select#pageLinksDropdown option:not(:first)').remove();
		
		
		$('#pageList ul:visible iframe').each(function(){
			
			if( $(this).contents().find( pageContainer + " > *:first" ).attr('id') != undefined ) {
				
				if( $(el).attr('href') == '#'+$(this).contents().find( pageContainer + " > *:first" ).attr('id') ) {
					
					newOption = '<option selected value=#'+$(this).contents().find( pageContainer + " > *:first" ).attr('id')+'>#'+$(this).contents().find( pageContainer + " > *:first" ).attr('id')+'</option>';
					
				} else {
					
					newOption = '<option value=#'+$(this).contents().find( pageContainer + " > *:first" ).attr('id')+'>#'+$(this).contents().find( pageContainer + " > *:first" ).attr('id')+'</option>';
					
				}
				
				
				
				$('select#pageLinksDropdown').append( newOption );
				
			}
			
		})
		
	
	} 
	
	if( $(el).attr('data-type') == 'video' ) {
	
		$('a#video_Link').parent().show();
		
		$('a#video_Link').click();
				
		//inject current video ID,check if we're dealing with Youtube or Vimeo
		
		if( $(el).prev().attr('src').indexOf("vimeo.com") > -1 ) {//vimeo
			
			match = $(el).prev().attr('src').match(/player\.vimeo\.com\/video\/([0-9]*)/);
			
			//console.log(match);
			
			$('#video_Tab input#vimeoID').val( match[match.length-1] );
			$('#video_Tab input#youtubeID').val('');
			
		} else {//youtube
			
			//temp = $(el).prev().attr('src').split('/');
			
			var regExp = /.*(?:youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=)([^#\&\?]*).*/;
			var match = $(el).prev().attr('src').match(regExp);
				
			$('#video_Tab input#youtubeID').val( match[1] );
			$('#video_Tab input#vimeoID').val('');
			
		}
		
		
		
		//alert( $(el).prev().attr('src') )
		
		
	} 
	
	if( $(el).prop('tagName') == 'IMG' ){
		
		$('a#img_Link').parent().show();
				
		//set the current SRC
		$('.imageFileTab').find('input#imageURL').val( $(el).attr('src') )
		
		
		//reset the file upload
		$('.imageFileTab').find('a.fileinput-exists').click();
		
			
	} 
	
	if( $(el).hasClass('icon') ) {
	
		$('a#icon_Link').parent().show();
			
		//get icon class name, starting with fa-
		var get = $.grep(el.className.split(" "), function(v, i){
		
			return v.indexOf('icon-') === 0;
			
		}).join();
		
		$('select#icons option').each(function(){
		
			if( $(this).val() == get ) {
			
				$(this).attr('selected', true);
				
				$('#icons').trigger('chosen:updated');
			
			}
		
		})
	
	} 
	
	
	//$(el).addClass('builder_active');	
	
	//remove borders from other elements
	$('#pageList ul:visible li iframe').each(function(){
		
		//remove borders		
		
		for( var key in editableItems ) {
		
			$(this).contents().find( pageContainer + ' '+ key ).css({'outline': 'none', 'cursor': 'default'});
			
			$(this).contents().find( pageContainer + ' '+ key ).hover( function(e){
			
				e.stopPropagation();
			
				if( $(this).closest('body').width() != $(this).width() ) {
											
					$(this).css({'outline': '3px dashed red', 'cursor': 'pointer'});
						
				} else {
							
					$(this).css({'outline': '3px dashed red', 'outline-offset': '-3px', 'cursor': 'pointer'});
							
				}
			
			}, function(){
									
				if( $(this).closest('body').width() != ($(this).width()+6) ) {
						
					$(this).css({'outline': '', 'cursor': ''});
						
				} else {
						
					$(this).css({'border': '', 'cursor': '', 'outline-offset': ''});
						
				}
				
			} )
		
		}
		
	});
	
	//unbind event
	$(el).unbind('mouseenter mouseleave');
	
	if( $(el).closest('body').width() != $(el).width() ) {
											
		$(el).css({'outline': '3px dashed red', 'cursor': 'pointer'});
						
	} else {
							
		$(el).css({'outline': '3px dashed red', 'outline-offset':'-3px',  'cursor': 'pointer'});
							
	}
	
	
	
	//remove all style attributes
	
	$('#styleElements > *:not(#styleElTemplate)').each(function(){
	
		$(this).remove();
	
	})
	
	
	//load the attributes
	
	buildeStyleElements(el, theSelector)
	
	
	//show style editor if hidden
	
	if( $('#styleEditor').css('left') == '-300px' ) {
	
		$('#styleEditor').animate({'left': '0px'}, 250);
	
	}
	
	
	//save button
	$('button#saveStyling').unbind('click').bind('click', function(){
	
		$('#styleEditor #tab1 .form-group:not(#styleElTemplate) input, #styleEditor #tab1 .form-group:not(#styleElTemplate) select').each(function(){
		
			//alert( $(this).attr('name')+":"+$(this).val() )
			
			$(el).css( $(this).attr('name'),  $(this).val());
			
			/* SANDBOX */
			
			sandboxID = hasSandbox($(el))
			
			if( sandboxID ) {
				
				elementID = $(el).attr('id');
				
				$('#'+sandboxID).contents().find('#'+elementID).css( $(this).attr('name'),  $(this).val() )
				
			}
			
			/* END SANDBOX */
					
		})
		
		
		//links
		if( $(el).prop('tagName') == 'A' ) {
			
			//change the href prop?
				
			if( $('select#internalLinksDropdown').val() != '#' ) {
									
				$(el).attr('href', $('select#internalLinksDropdown').val());
				
			} else if( $('select#pageLinksDropdown').val() != '#' ) {
									
				$(el).attr('href', $('select#pageLinksDropdown').val() );
					
			} else if( $('input#internalLinksCustom').val() != '' ) {
								
				$(el).attr('href', $('input#internalLinksCustom').val());
				
			}
			
			/* SANDBOX */
			
			sandboxID = hasSandbox( $(el) )
			
			if( sandboxID ) {
				
				elementID = $(el).attr('id');
								
				if( $('select#internalLinksDropdown').val() != '#' ) {
									
					$('#'+sandboxID).contents().find('#'+elementID).attr('href', $('select#internalLinksDropdown').val());
				
				} else if( $('select#pageLinksDropdown').val() != '#' ) {
									
					$('#'+sandboxID).contents().find('#'+elementID).attr('href', $('select#pageLinksDropdown').val() );
					
				} else if( $('input#internalLinksCustom').val() != '' ) {
								
					$('#'+sandboxID).contents().find('#'+elementID).attr('href', $('input#internalLinksCustom').val());
				
				}
				
			}
			
			/* END SANDBOX */
			
		}
		
		if( $(el).parent().prop('tagName') == 'A' ) {
			
			//change the href prop?
				
			if( $('select#internalLinksDropdown').val() != '#' ) {
									
				$(el).parent().attr('href', $('select#internalLinksDropdown').val());
				
			} else if( $('select#pageLinksDropdown').val() != '#' ) {
									
				$(el).parent().attr('href', $('select#pageLinksDropdown').val() );
					
			} else if( $('input#internalLinksCustom').val() != '' ) {
								
				$(el).parent().attr('href', $('input#internalLinksCustom').val());
				
			}
			
			/* SANDBOX */
			
			sandboxID = hasSandbox( $(el) )
			
			if( sandboxID ) {
				
				elementID = $(el).attr('id');
								
				if( $('select#internalLinksDropdown').val() != '#' ) {
									
					$('#'+sandboxID).contents().find('#'+elementID).parent().attr('href', $('select#internalLinksDropdown').val());
				
				} else if( $('select#pageLinksDropdown').val() != '#' ) {
									
					$('#'+sandboxID).contents().find('#'+elementID).parent().attr('href', $('select#pageLinksDropdown').val() );
					
				} else if( $('input#internalLinksCustom').val() != '' ) {
								
					$('#'+sandboxID).contents().find('#'+elementID).parent().attr('href', $('input#internalLinksCustom').val());
				
				}
				
			}
			
			/* END SANDBOX */
			
		}
		
		
		//do we need to upload an image?
		if( $('a#img_Link').css('display') == 'block' && $('input#imageFileField').val() != '' ) {
				
			var form = $('form#imageUploadForm');
			
			var formdata = false;
			
			if (window.FormData){
				formdata = new FormData(form[0]);
			}
			
			var formAction = form.attr('action');
			
			$.ajax({
				url : formAction,
				data : formdata ? formdata : form.serialize(),
				cache : false,
				contentType : false,
				processData : false,
				dataType: "json",
				type : 'POST',
			}).done(function(response){
							
				if( response.code == 1 ) {//success
				
					$('input#imageURL').val( response.response );
				
					$(el).attr('src', response.response);
					
					//reset the file upload
					$('.imageFileTab').find('a.fileinput-exists').click();
					
					/* SANDBOX */
			
					sandboxID = hasSandbox( $(el) )
			
					if( sandboxID ) {
				
						elementID = $(el).attr('id');
								
						$('#'+sandboxID).contents().find('#'+elementID).attr('src', response.response);
				
					}
			
					/* END SANDBOX */
				
				} else if( response.code == 0 ) {//error
				
					alert('Something went wrong: '+response.response)
				
				}
			
			})				
			
					
		} else if( $('a#img_Link').css('display') == 'block' ) {
		
			
			//no image to upload, just a SRC change
			if( $('input#imageURL').val() != '' && $('input#imageURL').val() != $(el).attr('src') ) {
			
				$(el).attr('src', $('input#imageURL').val());
				
				/* SANDBOX */
		
				sandboxID = hasSandbox( $(el) )
		
				if( sandboxID ) {
			
					elementID = $(el).attr('id');
							
					$('#'+sandboxID).contents().find('#'+elementID).attr('src', $('input#imageURL').val());
			
				}
		
				/* END SANDBOX */
			
			}
			
		
		}
		
		
		//icons
		
		if( $(el).hasClass('icon') ) {
		
			//out with the old, in with the new :)
			//get icon class name, starting with fa-
			var get = $.grep(el.className.split(" "), function(v, i){
			
				return v.indexOf('icon-') === 0;
				
			}).join();
			
			//if the icons is being changed, save the old one so we can reset it if needed
			
			if( get != $('select#icons').val() ) {
			
				$(el).uniqueId();
			
				_oldIcon[$(el).attr('id')] = get;
				
				//alert( _oldIcon[$(el).attr('id')] )
							
			}
			
			$(el).removeClass( get ).addClass( $('select#icons').val() );
			
			
			/* SANDBOX */
	
			sandboxID = hasSandbox( $(el) )
	
			if( sandboxID ) {
		
				elementID = $(el).attr('id');
						
				$('#'+sandboxID).contents().find('#'+elementID).removeClass( get ).addClass( $('select#icons').val() );
		
			}
	
			/* END SANDBOX */
		
		}
		
		
		//video URL
		
		if( $(el).attr('data-type') == 'video' ) {
		
			if( $('input#youtubeID').val() != '' ) {
			
				$(el).prev().attr('src', "//www.youtube.com/embed/"+$('#video_Tab input#youtubeID').val());
			
			} else if( $('input#vimeoID').val() != '' ) {
				
				$(el).prev().attr('src', "//player.vimeo.com/video/"+$('#video_Tab input#vimeoID').val()+"?title=0&amp;byline=0&amp;portrait=0");
				
			}
			
			
			/* SANDBOX */
	
			sandboxID = hasSandbox( $(el) )
	
			if( sandboxID ) {
		
				elementID = $(el).attr('id');
						
				if( $('input#youtubeID').val() != '' ) {
			
					$('#'+sandboxID).contents().find('#'+elementID).prev().attr('src', "//www.youtube.com/embed/"+$('#video_Tab input#youtubeID').val());
			
				} else if( $('input#vimeoID').val() != '' ) {
				
					$('#'+sandboxID).contents().find('#'+elementID).prev().attr('src', "//player.vimeo.com/video/"+$('#video_Tab input#vimeoID').val()+"?title=0&amp;byline=0&amp;portrait=0");
				
				}
		
			}
	
			/* END SANDBOX */
			
		}
		
		
		$('#detailsAppliedMessage').fadeIn(600, function(){
		
			setTimeout(function(){ $('#detailsAppliedMessage').fadeOut(1000) }, 3000)
		
		})
		
		heightAdjustment(el);
		
		setPendingChanges(true);
	
	});
	
	
	//delete button
	$('button#removeElementButton').unbind('click').bind('click', function(){
	
		if( $(el).prop('tagName') == 'A' ) {//ancor
		
			if( $(el).parent().prop('tagName') == 'LI' ) {//clone the LI
								
				toDel = $(el).parent();
							
			} else {
			
				toDel = $(el);
			
			}
			
		} else if( $(el).prop('tagName') == 'IMG' ) {//image
		
			if( $(el).parent().prop('tagName') == 'A' ) {//clone the A
				
				toDel = $(el).parent();
			
			} else {
			
				toDel = $(el);
			
			}
		
		} else {//everything else
			
			toDel = $(el);
		
		}
		
		$('#styleEditor').on('click', 'button#removeElementButton', function(){
		
			$('#deleteElement').modal('show');
			
			$('#deleteElement button#deleteElementConfirm').unbind('click').bind('click', function(){
			
				toDel.fadeOut(500, function(){
				
					randomEl = $(this).closest('body').find('*:first');
				
					toDel.remove();
					
					heightAdjustment(randomEl[0])
				
				})
				
				$('#deleteElement').modal('hide');
				
				closeStyleEditor();
			
			})
		
		})
	
	})
	
	
	//clone button
	$('button#cloneElementButton').unbind('click').bind('click', function(){
		
		if( $(el).parent().hasClass('propClone') ) {//clone the parent element
					
			theClone = $(el).parent().clone();
			theClone.find( $(el).prop('tagName') ).attr('style', '');
			
			theOne = theClone.find( $(el).prop('tagName') );
			cloned = $(el).parent();
		
			cloneParent = $(el).parent().parent();
		
		} else {//clone the element itself
		
			theClone = $(el).clone();
			theClone.attr('style', '');
			
			theOne = theClone;
			cloned = $(el);
			
			cloneParent = $(el).parent();
		
		}
				
		cloned.after( theClone );
		
		//theClone.insertAfter( cloned );
		
				
		for( var key in editableItems ) {
								
			$(el).closest('body').find( pageContainer + ' '+ key ).each( function(){
													
				if( $(this)[0] === $(theOne)[0] ) {
													
					theOne.hover( function(){
											
						if( $(this).closest('body').width() != $(this).width() ) {
											
							$(this).css({'outline': '3px dashed red', 'cursor': 'pointer'});
						
						} else {
							
							$(this).css({'outline': '3px dashed red', 'outline-offset': '-3px', 'cursor': 'pointer'});
							
						}
					
					}, function(){
											
						if( $(this).closest('body').width() != ($(this).width()+6) ) {
						
							$(this).css({'outline': '', 'cursor': ''});
						
						} else {
						
							$(this).css({'outline': '', 'cursor': '', 'outline-offset': ''});
						
						}
						
					} ).click( function(e){
					
						e.preventDefault();
						
						e.stopPropagation();
					
						styleClick(this, key)
						
					
					} ).each( function(){
					
						$(this).attr('data-selector', key)
					
					} );
				
				}		
			});
		
		}
		
		//possible height adjustments
						
		heightAdjustment(el);
	
	})
	
	
	//reset button
	$('button#resetStyleButton').unbind('click').bind('click', function(){
	
		if( $(el).closest('body').width() != $(el).width() ) {
			
			$(el).attr('style', '').css({'outline': '3px dashed red', 'cursor': 'pointer'})
		
		} else {
			
			$(el).attr('style', '').css({'outline': '3px dashed red', 'outline-offset':'-3px', 'cursor': 'pointer'})
			
		}
		
		$('#styleEditor form#stylingForm').height( $('#styleEditor form#stylingForm').height()+"px" );
		
		$('#styleEditor form#stylingForm .form-group:not(#styleElTemplate)').fadeOut(500, function(){
		
			$(this).remove()
		
		})
		
		//reset icon
		
		if( _oldIcon[$(el).attr('id')] != null ) {
		
			var get = $.grep(el.className.split(" "), function(v, i){
			
				return v.indexOf('icon-') === 0;
				
			}).join();
			
			$(el).removeClass( get ).addClass( _oldIcon[$(el).attr('id')] );
			
			$('select#icons option').each(function(){
			
				if( $(this).val() == _oldIcon[$(el).attr('id')] ) {
				
					$(this).attr('selected', true);
					
					$('#icons').trigger('chosen:updated');
									
				}
			
			})
		
		}
		
		setTimeout( function(){buildeStyleElements(el, theSelector)}, 550)
		
	})
	
	
	

}


function closeStyleEditor() {
	
	//only if visible
		
	if( $('#styleEditor').css('left') == '0px' ) {

		$('#styleEditor').animate({'left': '-300px'}, 250);
	
		$('#pageList ul li iframe').each(function(){
		
			//remove hover events used by Styling modus			
		
			for( var key in editableItems ) {
		
				$(this).contents().find( pageContainer + ' '+ key ).unbind('mouseenter mouseleave click').css({'outline': '', 'cursor': ''});
		
			}
			
		
			if ( $('input:radio[name=mode]:checked').val() == 'styling' ) {
			
				$('#pageList ul li iframe').each(function(){
			
					for( var key in editableItems ) {
				
						$(this).contents().find( pageContainer + ' '+ key ).hover( function(e){
											
							e.stopPropagation();
											
							if( $(this).closest('body').width() != $(this).width() ) {
							
								$(this).css({'outline': '3px dashed red', 'cursor': 'pointer'});
							
							} else {
							
								$(this).css({'outline': '3px dashed red', 'outline-offset': '-3px', 'cursor': 'pointer'});
							
							}
					
						}, function(){
											
							if( $(this).closest('body').width() != ($(this).width()+6) ) {
						
								$(this).css({'outline': '', 'cursor': ''});
						
							} else {
						
								$(this).css({'outline': '', 'cursor': '', 'outline-offset': ''});
						
							}
						
						} ).click( function(e){
					
							e.preventDefault();
							
							e.stopPropagation();
						
							styleClick(this, key)
						
						} );
				
					}				
			
				})
		
			}
				
		})
	
	}

}


$(function(){

	//video ID toggle
	
	$('input#youtubeID').focus(function(){
			
		$('input#vimeoID').val('');
		
	})
	
	$('input#vimeoID').focus(function(){
		
		$('input#youtubeID').val('');
		
	})
	

	//chosen font-awesome dropdown
	
	$('select#icons').chosen({
		'search_contains': true
	});

	//detect mode
	if( window.location.protocol == 'file:' ) {
	
		_mode = "local";
	
	} else {
	
		_mode = "server";
	
	}
		
	//check if formData is supported
	if (!window.FormData){
		
		//not supported, hide file upload
		$('form#imageUploadForm').hide();
		
		$('.imageFileTab .or').hide();
	
	}
	

	//internal links dropdown
	
	$('select#internalLinksDropdown').selectpicker({style: 'btn-sm btn-default', menuStyle: 'dropdown-inverse'});
	$('select#internalLinksDropdown').change(function(){
		
		$('select#pageLinksDropdown option').attr('selected', false);
		
		$('.link_Tab .btn-group.select:eq(1) .dropdown-menu li').removeClass('selected');
		
		$('.link_Tab .btn-group.select:eq(1) > button .filter-option').text( $('.link_Tab .btn-group.select:eq(1) .dropdown-menu li:first').text() )
		
	})
	
	$('select#pageLinksDropdown').selectpicker({style: 'btn-sm btn-default', menuStyle: 'dropdown-inverse'});
	
	$('select#pageLinksDropdown').change(function(){
		
		$('select#internalLinksDropdown option').attr('selected', false);
		
		$('.link_Tab .btn-group.select:eq(0) .dropdown-menu li').removeClass('selected');
		
		$('.link_Tab .btn-group.select:eq(0) > button .filter-option').text( $('.link_Tab .btn-group.select:eq(0) .dropdown-menu li:first').text() )
		
	})

	
	$('input#internalLinksCustom').focus(function(){
	
		$('select#internalLinksDropdown option').attr('selected', false);
		$('select#pageLinksDropdown option').attr('selected', false);
		
		$('.link_Tab .dropdown-menu li').removeClass('selected');
		
		$('.link_Tab .btn-group.select > button .filter-option').text( $('.link_Tab .dropdown-menu li:first').text() )
		
		this.select();
	
	})
	
	
	$('#detailsAppliedMessageHide').click(function(){
	
		$(this).parent().fadeOut(500)
	
	})


	//hide style editor option?
	
	if( typeof editableItems === 'undefined' ) {
	
		$('#modeStyle').parent().remove();
	
	}
	
	$('#closeStyling').click(function(){
	
		closeStyleEditor();
	
	})


	$('#styleEditor form').on("focus", "input", function(){
	
		$(this).css('position', 'absolute');
		$(this).css('right', '0px')
		
		$(this).animate({'width': '100%'}, 500);
		
		$(this).focus(function(){
		    this.select();
		});
	
	}).on("blur", "input", function(){
		
		$(this).animate({'width': '42%'}, 500, function(){
		
			$(this).css('position', 'relative');
			$(this).css('right', 'auto');
		
		})
	
	})
		
		
	for( var key in _Elements.elements ) {
					
		niceKey = key.toLowerCase().replace(" ", "_");
		
		$('<li><a href="" id="'+niceKey+'">'+key+'</a></li>').appendTo('#menu #main ul#elements');
			
		for( x=0; x<_Elements.elements[key].length; x++ ) {
			
			//alert( data.elements[key][x].url )
			
			
			if( _Elements.elements[key][x].thumbnail == null ) {//we'll need an iframe
			
				//build us some iframes!
			
				if( _Elements.elements[key][x].sandbox != null ) {
					
					if( _Elements.elements[key][x].loaderFunction != null ) {
						loaderFunction = 'data-loaderfunction="'+_Elements.elements[key][x].loaderFunction+'"';
					}
			
					newItem = $('<li class="element '+niceKey+'"><iframe src="'+_Elements.elements[key][x].url+'" scrolling="no" data-sandbox="" '+loaderFunction+'></iframe></li>');
			
				} else {
				
					newItem = $('<li class="element '+niceKey+'"><iframe src="about:blank" scrolling="no"></iframe></li>');
			
				}
				
				newItem.find('iframe').uniqueId();
				
				newItem.find('iframe').attr('src', _Elements.elements[key][x].url);
			
			} else {//we've got a thumbnail
				
				if( _Elements.elements[key][x].sandbox != null ) {
					
					if( _Elements.elements[key][x].loaderFunction != null ) {
						loaderFunction = 'data-loaderfunction="'+_Elements.elements[key][x].loaderFunction+'"';
					}
					
					newItem = $('<li class="element '+niceKey+'"><img src="'+_Elements.elements[key][x].thumbnail+'" data-srcc="'+_Elements.elements[key][x].url+'" data-height="'+_Elements.elements[key][x].height+'" data-sandbox="" '+loaderFunction+'></li>')
					
				} else {
			
					newItem = $('<li class="element '+niceKey+'"><img src="'+_Elements.elements[key][x].thumbnail+'" data-srcc="'+_Elements.elements[key][x].url+'" data-height="'+_Elements.elements[key][x].height+'"></li>')
					
				}
			
			}
			
			
							
			newItem.appendTo('#menu #second ul');		
			
				
			//zoomer works
				
			if( _Elements.elements[key][x].height ) {
				
				theHeight = _Elements.elements[key][x].height*0.25;
				
			} else {
				
				theHeight = 'auto'
				
			}
				
			newItem.find('iframe').zoomer({
				zoom: 0.25,
				width: 270,
				height: theHeight,
				message: "Drag&Drop Me!"
			});
			
		}
			
		//draggables
		makeDraggable( '#page1' )
	
	}
	
	//main menu hide/show
	
	
	
	$('#menu').mouseenter(function(){
		
		$(this).stop().animate({'left': '0px'}, 500);
		
	}).mouseleave(function(){
		
		$(this).stop().animate({'left': '-190px'}, 500);
		
	})
		
	//use function call to make the ULs sortable
	makeSortable( $('#pageList ul#page1') );
		
	//second menu animation		
	$('#menu #main #elements').on('click', 'a:not(.btn)', function(){
	
		$('#menu #main a').removeClass('active');
		$(this).addClass('active');
	
		//show only the right elements
		$('#menu #second ul li').hide();
		$('#menu #second ul li.'+$(this).attr('id')).show();
		
		if( $(this).attr('id') == 'all' ) {
		
			$('#menu #second ul li').show();
		
		}
	
		$('.menu .second').css('display', 'block').stop().animate({
			width: secondMenuWidth
		}, 500);	
		
	
	})
	
	//second nav hide button
	$('#menu').mouseleave(function(){
	
		$('#menu #main a').removeClass('active');

		$('.menu .second').stop().animate({
			width: 0
		}, 500, function(){
		
			$('#menu #second').hide();
		
		});

	});
	
	
	$('#menu #main').on('click', 'a:not(.actionButtons)', function(e){
	
		e.preventDefault();
	
	})

	$('#menu').mouseleave(function(){
	
		$('#menu #main a').removeClass('active');

		$('.menu .second').stop().animate({
			width: 0
		}, 500, function(){
		
			$('#menu #second').hide();
		
		});

	});
	
	
	//disable on load
	$('input:radio[name=mode]').parent().addClass('disabled');
	$('input:radio[name=mode]#modeBlock').radio('check');
	
	
	var elToUpdate;
	
	
	//design mode toggle
	$('input:radio[name=mode]').on('toggle', function(){
	
		if( $(this).val() == 'content' ) {
		
			//close style editor
			closeStyleEditor();
		
			//hide all iframe covers and activate designMode
			
			$('#pageList ul .frameCover').each(function(){
			
				$(this).hide();
			
			})

			
			
			$('#pageList ul li iframe').each(function(){
			
				
				//remove old click events
			
				for( var key in editableItems ) {
								
					$(this).contents().find( pageContainer + ' '+ key ).unbind('hover').unbind('click');
				
				}				
			
			})
			
			
			//active content edit mode
			$('#pageList ul li iframe').each(function(){
			
				
				for (i=0; i<editableContent.length; ++i) {
					
					//remove old events
					$(this).contents().find( pageContainer + ' '+editableContent[i] ).unbind('click').unbind('hover');
					
					
					$(this).contents().find( pageContainer + ' '+editableContent[i] ).hover( function(){
											
						$(this).css({'outline': '3px dashed red', 'cursor': 'pointer'})
					
					}, function(){
											
						$(this).css({'outline': '', 'cursor': ''})
						
					} ).click( function(e){
				
						elToUpdate = $(this);
					
						e.preventDefault();
						
						e.stopPropagation();
										
						$('#editContentModal #contentToEdit').val( $(this).html() )
					
						$('#editContentModal').modal('show');
						
						//for the elements below, we'll use a simplyfied editor, only direct text can be done through this one
						if( this.tagName == 'SMALL' || this.tagName == 'A' || this.tagName == 'LI' || this.tagName == 'SPAN' || this.tagName == 'B' || this.tagName == 'I' || this.tagName == 'TT' || this.tageName == 'CODE' || this.tagName == 'EM' || this.tagName == 'STRONG' || this.tagName == 'SUB' || this.tagName == 'BUTTON' || this.tagName == 'LABEL' || this.tagName == 'P' || this.tagName == 'H1' || this.tagName == 'H2' || this.tagName == 'H2' || this.tagName == 'H3' || this.tagName == 'H4' || this.tagName == 'H5' || this.tagName == 'H6' ) {
							
							$('#editContentModal #contentToEdit').redactor({
								buttons: ['html', 'bold', 'italic', 'deleted'],
								focus: true,
								plugins: ['bufferbuttons'],
								buttonSource: true,
								paragraphize: false,
								linebreaks: true
							});
							
						} else if( this.tagName == 'DIV' && $(this).hasClass('tableWrapper') ) {
							
							$('#editContentModal #contentToEdit').redactor({
								buttons: ['html', 'formatting', 'bold', 'italic', 'deleted', 'table', 'image', 'link', 'alignment'],
								focus: true,
								plugins: ['table', 'bufferbuttons'],
								buttonSource: true,
								paragraphize: false,
								linebreaks: false
							});
							
						} else {
					
							$('#editContentModal #contentToEdit').redactor({
								buttons: ['html', 'formatting', 'bold', 'italic', 'deleted', 'unorderedlist', 'orderedlist', 'outdent', 'indent', 'image', 'file', 'link', 'alignment', 'horizontalrule'],
								focus: true,
								buttonSource: true,
								paragraphize: false,
								linebreaks: false
							});
						}
						
					
					} ).each( function(){
					
						$(this).attr('data-selector', key)
					
					} );
					
				}
							
			})
			
			
		
		} else if( $(this).val() == 'block' ) {
		
			//close style editor
			closeStyleEditor();
		
			//show all iframe covers and activate designMode
			
			$('#pageList ul .frameCover').each(function(){
			
				$(this).show();
			
			})
			
			//deactivate designmode
			
			$('#pageList ul li iframe').each(function(){
			
				
				for( var key in editableItems ) {
				
					$(this).contents().find( pageContainer + ' '+ key ).unbind('mouseenter mouseleave');
				
				}
			
				this.contentDocument.designMode = "off";
			
			})
		
		} else if( $(this).val() == 'styling' ) {
		
			//hide all iframe covers and activate designMode
			
			$('#pageList ul .frameCover').each(function(){
			
				$(this).hide();
			
			})
			
			
			
			//active styling mode
			$('#pageList ul li iframe').each(function(){
			
				
				//remove old click events
				$(this).contents().find( pageContainer + ' p' ).unbind('click').unbind('hover');
				
			
				for( var key in editableItems ) {
								
					$(this).contents().find( pageContainer + ' '+ key ).hover( function(e){
												
						e.stopPropagation();
											
						if( $(this).closest('body').width() != $(this).width() ) {
											
							$(this).css({'outline': '3px dashed red', 'cursor': 'pointer'});
						
						} else {
							
							$(this).css({'outline': '3px dashed red', 'outline-offset': '-3px', 'cursor': 'pointer'});
							
						}
					
					}, function(){
											
						$(this).css({'outline': '', 'cursor': '', 'outline-offset': ''})
						
					} ).click( function(e){
					
						e.preventDefault();
						
						e.stopPropagation();
					
						styleClick(this, key)
						
					
					} ).each( function(){
					
						$(this).attr('data-selector', key)
					
					} );
				
				}				
			
			})
		
		}
	
	});
	
	
	$('button#updateContentInFrameSubmit').click(function(){
		
		//alert( elToUpdate.text() )
		
		elToUpdate.html( $('#editContentModal #contentToEdit').redactor('code.get') ).css({'outline': '', 'cursor':''});
		
		/* SANDBOX */
		
		sandboxID = hasSandbox( elToUpdate )
		
		if( sandboxID ) {
			
			elementID = elToUpdate.attr('id');
			
			$('#'+sandboxID).contents().find('#'+elementID).html( $('#editContentModal #contentToEdit').redactor('code.get') );
			
		}
		
		/* END SANDBOX */
				
		$('#editContentModal textarea').each(function(){
			
			$(this).redactor('core.destroy');
			$(this).val('');
			
		});
		
		$('#editContentModal').modal('hide');
		
		$(this).closest('body').removeClass('modal-open').attr('style', '');
		
		//reset iframe height
		heightAdjustment(elToUpdate.get(0));
		
		//element was deleted, so we've got pending changes
		setPendingChanges(true)
						
	})
	
	
	//close styleEditor
	$('#styleEditor > a.close').click(function(e){
	
		e.preventDefault();
		
		closeStyleEditor();
	
	})
	
	
	//delete blocks from window
	
	var blockToDelete;
	
	$('#pageList').on("click", ".frameCover > .deleteBlock", function(){
	
		$('#deleteBlock').modal('show');
		
		blockToDelete = $(this).closest('li');
	
		$('#deleteBlock').off('click', '#deleteBlockConfirm').on('click', '#deleteBlockConfirm', function(){
		
			
			/* SANDBOX */
			
			var attr = blockToDelete.find('iframe').attr('data-sandbox');
				
			if (typeof attr !== typeof undefined && attr !== false) {
		
				//has sandbox, delete it
				$('#sandboxes #'+attr).remove();
		
			}
		
			/* END SANDBOX */
			
		
			$('#deleteBlock').modal('hide');
		
			blockToDelete.fadeOut(500, function(){
			
				$(this).remove();
				
				pageEmpty();
				
				allEmpty();
				
				setPendingChanges(true)
			
			})			
		
		})
	
	});
	
	
	//reset block
	$('#pageList').on("click", ".frameCover > .resetBlock", function(){
		
		$('#resetBlock').modal('show');
		
		frameToReset = $(this).closest('li').find('iframe');
					
		$('#resetBlock').off('click', '#resetBlockConfirm').on('click', '#resetBlockConfirm', function(){
		
			$('#resetBlock').modal('hide');
		
			frameToReset.get(0).contentWindow.location.reload();
			
			/* SANDBOX */
			
			var attr = frameToReset.attr('data-sandbox');
	
			if (typeof attr !== typeof undefined && attr !== false) {
		
				//has sandbox, reset it
				document.getElementById(attr).contentDocument.location.reload(true);
		
			}
		
			/* END SANDBOX */
		
		})
	
	});
	
	
	var aceEditors = new Array();//store all ace editors
	
	
	//block source code
	$('#pageList').on("click", ".frameCover > .htmlBlock", function(){
		
		//hide the iframe
		$(this).closest('.li').find('iframe').hide();
		
		
		//disable draggable on the LI
		$(this).closest('li').parent().sortable('disable');
				
				
		//built editor element
		theEditor = $('<div class="aceEditor"></div>');
		theEditor.uniqueId();
		
		//set the editor height
		theEditor.height( $(this).closest('li').height() )
		
		$(this).closest('li').append( theEditor );
		
		theId = theEditor.attr('id');
		
		var editor = ace.edit( theId );
		
		//sandbox?
		
		var attr = $(this).closest('li').find('iframe').attr('data-sandbox');

		if (typeof attr !== typeof undefined && attr !== false) {
			
			editor.setValue( $('#sandboxes #'+attr).contents().find( pageContainer ).html() );
			
			//has sandbox, reset it
			document.getElementById(attr).contentDocument.location.reload(true);
	
		} else {
			
			editor.setValue( $(this).closest('li').find('iframe').contents().find( pageContainer ).html() );
			
		}
			
		
		editor.setTheme("ace/theme/twilight");
		editor.getSession().setMode("ace/mode/html");
		
		//buttons
		
		cancelButton = $('<button type="button" class="btn btn-danger editCancelButton btn-wide"><span class="fui-cross"></span> Cancel</button>');
		saveButton = $('<button type="button" class="btn btn-primary editSaveButton btn-wide"><span class="fui-check"></span> Save</button>');
	
		buttonWrapper = $('<div class="editorButtons"></div>');
		buttonWrapper.append( cancelButton );
		buttonWrapper.append( saveButton );
		
		$(this).closest('li').append( buttonWrapper );
		
		aceEditors[ theId ] = editor;
		
	});
	
	
	$('#pageList').on("click", "li .editorButtons .editCancelButton", function(){
		
		//theId = $(this).closest('.editorButtons').prev().attr('id');
		
		//enable draggable on the LI
		$(this).closest('li').parent().sortable('enable');
		
		$(this).parent().prev().remove();
		
		$(this).closest('li').find('.zoomer-small iframe').fadeIn(500);
		
		$(this).parent().fadeOut(500, function(){
			
			$(this).remove();
			
		})
						
	});
	
	
	$('#pageList').on("click", "li .editorButtons .editSaveButton", function(){
		
		//enable draggable on the LI
		$(this).closest('li').parent().sortable('enable');
		
		
		theId = $(this).closest('.editorButtons').prev().attr('id');

		theContent = aceEditors[theId].getValue();
		
		theiFrame = $(this).closest('li').find('iframe');
						
		
		$(this).parent().prev().remove();
		
		
		
		//theiFrame.contents().find( pageContainer ).html( theContent );
		
		
		/* SANDBOX */
		
		var attr = $(this).closest('li').find('iframe').attr('data-sandbox');

		if (typeof attr !== typeof undefined && attr !== false) {
							
			$('#sandboxes #'+attr).contents().find( pageContainer ).html( theContent );
			
			
			$(this).closest('li').find('iframe').show().contents().find( pageContainer ).html( theContent );
						
			//do we need to execute a loader function?
			if (typeof theiFrame.attr('data-loaderfunction') !== typeof undefined && theiFrame.attr('data-loaderfunction') !== false) {
			
				var codeToExecute = "theiFrame[0].contentWindow."+theiFrame.attr('data-loaderfunction')+"()";
				var tmpFunc = new Function(codeToExecute);
				tmpFunc();
			
			}
							
		} else {
			
			$(this).closest('li').find('iframe').show().contents().find( pageContainer ).html( theContent );
			
		}
		
		/* END SANDBOX */
		
		//height adjustment
		heightAdjustment( $(this).closest('li').find('iframe').attr('id'), true );
		
		
		$(this).parent().fadeOut(500, function(){
			
			$(this).remove();
			
		})
		
		setPendingChanges(true)
						
	});
	
	
	
	//save page
	$('#savePage').click(function(e){
		
		savePage(e);
		
	})
	
	
	
	//preview
	$('#previewModal').on('show.bs.modal', function (e) {
		
		$('#previewModal > form #showPreview').show('');
		
		$('#previewModal > form #previewCancel').text('Cancel & Close');
		
		closeStyleEditor();
	
	});
	
	$('#previewModal').on('shown.bs.modal', function (e) {
		
		$('#previewModal form input[type="hidden"]').remove();
		
		//grab visible page
		$('#pageList > ul:visible').each(function(){
		
			//grab the skeleton markup
							
			newDocMainParent = $('iframe#skeleton').contents().find( pageContainer );
			
			//empty out the skeleton
			newDocMainParent.find('*').remove();
			
			$(this).find('iframe').each(function(){
				
				
				//sandbox or regular?
				
				var attr = $(this).attr('data-sandbox');

				if (typeof attr !== typeof undefined && attr !== false) {
					
					theContents = $('#sandboxes #'+attr).contents().find( pageContainer );
				
				} else {
					
					theContents = $(this).contents().find( pageContainer );
					
				}
								
				
				//remove .frameCovers
					
				theContents.find('.frameCover').each(function(){
					$(this).remove();
				});
				
				
				//remove inline styling leftovers
				
				for( var key in editableItems ) {
					
					//alert('Key :'+key)
													
					theContents.find( key ).each(function(){
						
						//alert( "Data before: "+ $(this).attr('data-selector') );
						
						$(this).removeAttr('data-selector');
						
						//alert( "Data after: "+ $(this).attr('data-selector') );
						
						if( $(this).attr('style') == '' ) {
							$(this).removeAttr('style')
						}
						
					})
									
				}	
				for (i=0; i<editableContent.length; ++i) {
					
					$(this).contents().find( editableContent[i] ).each(function(){
						
						$(this).removeAttr('data-selector');
						
					})
										
				}
					
					
				toAdd = theContents.html();
				
				//grab scripts
				
				scripts = $(this).contents().find( pageContainer ).find('script');
				
				if( scripts.size() > 0 ) {
				
					theIframe = document.getElementById("skeleton");
				
					scripts.each(function(){
					
						if( $(this).text() != '' ) {//script tags with content
						
							var script = theIframe.contentWindow.document.createElement("script");
							script.type = 'text/javascript';
							script.innerHTML = $(this).text();
						
							theIframe.contentWindow.document.getElementById( pageContainer.substring(1) ).appendChild(script);
							
						} else if( $(this).attr('src') != null ) {
						
							var script = theIframe.contentWindow.document.createElement("script");
							script.type = 'text/javascript';
							script.src = $(this).attr('src');
							
							theIframe.contentWindow.document.getElementById( pageContainer.substring(1) ).appendChild(script)
						
						}
				
					})
				
				}
				
				newDocMainParent.append( $(toAdd) );
				
			});
			
			newInput = $('<input type="hidden" name="page" value="">');
			
			$('#previewModal form').prepend( newInput );
			
			newInput.val( "<!DOCTYPE html><html>"+$('iframe#skeleton').contents().find('html').html()+"</html>" )
			
		})
		
	});
	
	$('#previewModal > form').submit(function(){
	
		$('#previewModal > form #showPreview').hide('');
		
		$('#previewModal > form #previewCancel').text('Close Window');
	
	})
	
	
	
	//export markup
	
	$('#exportModal').on('show.bs.modal', function (e) {
	
		$('#exportModal > form #exportSubmit').show('');
		
		$('#exportModal > form #exportCancel').text('Cancel & Close');
		
		closeStyleEditor();
	
	});
	
	$('#exportModal').on('shown.bs.modal', function (e) {
		
		//delete older hidden fields
		
		$('#exportModal form input[type="hidden"]').remove();
		
		//loop through all pages
		$('#pageList > ul').each(function(){
				
			//grab the skeleton markup
							
			newDocMainParent = $('iframe#skeleton').contents().find( pageContainer );
			
			//empty out the skeleton
			newDocMainParent.find('*').remove();
			
			//loop through page iframes and grab the body stuff
				
			$(this).find('iframe').each(function(){
				
				
				//sandbox or regular?
				
				var attr = $(this).attr('data-sandbox');

				if (typeof attr !== typeof undefined && attr !== false) {
					
					theContents = $('#sandboxes #'+attr).contents().find( pageContainer );
				
				} else {
					
					theContents = $(this).contents().find( pageContainer );
					
				}
								
				
				//remove .frameCovers
					
				theContents.find('.frameCover').each(function(){
					$(this).remove();
				});
				
				
				//remove inline styling leftovers
				
				for( var key in editableItems ) {
					
					//alert('Key :'+key)
													
					theContents.find( key ).each(function(){
						
						//alert( "Data before: "+ $(this).attr('data-selector') );
						
						$(this).removeAttr('data-selector');
						
						//alert( "Data after: "+ $(this).attr('data-selector') );
						
						if( $(this).attr('style') == '' ) {
							$(this).removeAttr('style')
						}
						
					})
									
				}	
				for (i=0; i<editableContent.length; ++i) {
					
					$(this).contents().find( editableContent[i] ).each(function(){
						
						$(this).removeAttr('data-selector');
						
					})
										
				}
					
					
				toAdd = theContents.html();
				
				//grab scripts
				
				scripts = $(this).contents().find( pageContainer ).find('script');
				
				if( scripts.size() > 0 ) {
				
					theIframe = document.getElementById("skeleton");
				
					scripts.each(function(){
					
						if( $(this).text() != '' ) {//script tags with content
						
							var script = theIframe.contentWindow.document.createElement("script");
							script.type = 'text/javascript';
							script.innerHTML = $(this).text();
						
							theIframe.contentWindow.document.getElementById( pageContainer.substring(1) ).appendChild(script);
							
						} else if( $(this).attr('src') != null ) {
						
							var script = theIframe.contentWindow.document.createElement("script");
							script.type = 'text/javascript';
							script.src = $(this).attr('src');
							
							theIframe.contentWindow.document.getElementById( pageContainer.substring(1) ).appendChild(script)
						
						}
				
					})
				
				}
				
				newDocMainParent.append( $(toAdd) );
				
			});
			
			//theStyle = $('<style>body{width:100%}</style>');
			
			//$('iframe#skeleton').contents().find('head').append( $('<style>body{width:100%}</style>') )
			
			//create the hidden input
			
			//alert( $('#pages li:eq('+$(this).index()+1+') a:first').text() )
			
			newInput = $('<input type="hidden" name="pages['+$('#pages li:eq('+($(this).index()+1)+') a:first').text()+']" value="">');
			
			$('#exportModal form').prepend( newInput );
			
			newInput.val( "<html>"+$('iframe#skeleton').contents().find('html').html()+"</html>" )
		
		})
				
	});
	
	
	
	$('#exportModal > form').submit(function(){
	
		$('#exportModal > form #exportSubmit').hide('');
		
		$('#exportModal > form #exportCancel').text('Close Window');
	
	})
	
	
	//clear screen
	$('#clearScreen').click(function(){
	
		$('#deleteAll').modal('show');
		
		$('#deleteAll').on('click', '#deleteAllConfirm', function(){
		
			$('#deleteAll').modal('hide');
		
			$('#pageList ul:visible li').fadeOut(500, function(){
			
				$(this).remove();
					
				pageEmpty();
				
				allEmpty();
			
			});
			
			//remove possible sandboxes
			$('#sandboxes iframe').each(function(){
			
				$(this).remove();
			
			})
		
		})
		
		setPendingChanges(true);
	
	});
	
	
	//page menu buttons
	
	//add page
	
	$('#pages').on('blur', 'li > input', function(){
	
		if( $(this).parent().find('a.plink').size() == 0 ) {
								
			theLink = $('<a href="#'+$(this).val()+'" class="plink">'+$(this).val()+'</a>');
		
			$(this).hide();
		
			$(this).closest('li').prepend( theLink );
		
			$(this).closest('li').removeClass('edit');
			
			
			//update the page dropdown
			
			$('#internalLinksDropdown option:eq('+$(this).parent().index()+')').text( $(this).val() ).attr('value', $(this).val()+".html");
			
			$('select#internalLinksDropdown').selectpicker({style: 'btn-sm btn-default', menuStyle: 'dropdown-inverse'})
			
			//alert( ($(this).parent().index())+" : "+$(this).val() )
			
		
			$(this).remove();
		
		}
	
	})
	
	$('#addPage').click(function(e){
	
		e.preventDefault();
		
		//turn inputs into links
		$('#pages li.active').each(function(){
		
			if( $(this).find('input').size() > 0 ) {
							
				theLink = $('<a href="#">'+$(this).find('input').val()+'</a>');
				
				$(this).find('input').remove();
				
				$(this).prepend( theLink );
				
			}
			
		})
		
		$('#pages li').removeClass('active');
		
		newPageLI = $('#newPageLI').clone();
		newPageLI.css('display', 'block');
		newPageLI.find('input').val( 'page'+$('#pages li').size() );
		newPageLI.attr('id', '');
		
		$('ul#pages').append( newPageLI );
		
		
		theInput = newPageLI.find('input');
		
		theInput.focus();
		
		var tmpStr = theInput.val();
		theInput.val('');
		theInput.val(tmpStr);
		
		theInput.keyup( function(){
		
			$('#pageTitle span span').text( $(this).val() )
		
		} )
		
		newPageLI.addClass('active').addClass('edit');
					
		
		//create the page structure
		
		newPageList = $('<ul></ul>');
		newPageList.css('display','block');
		newPageList.attr('id', 'page'+($('#pages li').size()-1) );
		
		$('#pageList > ul').hide();
		$('#pageList').append( newPageList );
		
		
		makeSortable( newPageList );
		
		//draggables
		makeDraggable( '#'+'page'+($('#pages li').size()-1) )
		
		
		//alter page title
		$('#pageTitle span span').text( 'page'+($('#pages li').size()-1) );
		
		$('#frameWrapper').addClass('empty')
		$('#start').fadeIn();
		
		
		//add page to page dropdown
		
		newItem = $('<option value="'+'page'+($('#pages li').size()-1)+'.html">'+'page'+($('#pages li').size()-1)+'</option>')
		
		$('#internalLinksDropdown').append( newItem );
		
		$('select#internalLinksDropdown').selectpicker({style: 'btn-sm btn-default', menuStyle: 'dropdown-inverse'});
		
		//new page added, we've got pending changes
		setPendingChanges(true);
		
	})
	
	
	$('#pages').on('click', 'li:not(.active)', function(){
	
		$('#pageList > ul').hide();
		
		$('#pageList > ul:eq('+($(this).index()-1)+')').show();
		
		pageEmpty();
		
		//draggables
		makeDraggable( '#'+'page'+($(this).index()) )
	
		$('#pages li').removeClass('active').removeClass('edit');
		
		$(this).addClass('active');
		
		$('#pageTitle span span').text( $(this).find('a').text() );
	
	})
	
	
	$('#pages').on('click', 'li.active .fileSave', function(){
	
		//do something
		
		theLI = $(this).closest('li');
								
		if( theLI.find('input').size() > 0 ) {
					
			theLink = $('<a href="#'+theLI.find('input').val()+'">'+theLI.find('input').val()+'</a>');
			
			theLI.find('input').remove();
			
			theLI.prepend( theLink );
			
		}
		
		$('#pages li').removeClass('edit');
	
	});
	
	
	//edit page button
	
	$('#pages').on('click', 'li.active .fileEdit', function(){
	
		
		theLI = $(this).closest('li');
	
		newInput = $('<input type="text" value="'+theLI.find('a:first').text()+'" name="page">');
		
		theLI.find('a:first').remove();
		
		theLI.prepend( newInput );
		
		newInput.focus();
		
		var tmpStr = newInput.val();
		newInput.val('');
		newInput.val(tmpStr);
		
		newInput.keyup( function(){
		
			$('#pageTitle span span').text( $(this).val() )
		
		} )
		
		theLI.addClass('edit');
		
		//changed page title, we've got pending changes
		setPendingChanges(true);
	
	})
	
	var theLIIndex;
	
	//delete page button
	$('#pages').on('click', 'li.active .fileDel', function(){
	
		theLIIndex = $(this).parent().parent().index();
	
		$('#deletePage').modal('show');
		
		$('#deletePageCancel').click(function(){
		
			$('#deletePage').modal('hide');
		
		})
		
		$('#deletePage').off('click').on('click', '#deletePageConfirm', function(e){
		
			$('#deletePage').modal('hide');
		
			$('#pages li:eq('+theLIIndex+')').remove();
			
			$('#pageList ul:visible').remove();
			
			
			//update the page dropdown list
			
			$('select#internalLinksDropdown option:eq('+theLIIndex+')').remove();
			
			$('.link_Tab .dropdown-menu li:eq('+theLIIndex+')').remove();
			
			
			//activate the first page
			
			$('#pages li:eq(1)').addClass('active');
			
			$('#pageList ul:first').show();
			
			$('#pageTitle span span').text( $('#pages li:eq(1)').find('a:first').text() )
			
			
			//draggables
			makeDraggable( '#'+'page1' )
			
			
			//show the start block?
			
			pageEmpty();
			
			allEmpty();
			
			savePage(e);
			
			//page was deleted, so we've got pending changes
			setPendingChanges(true);
			
		
		})
	
	});
	
	
	//content modal, destroy redactor when modal closes
	$('#editContentModal').on('hidden.bs.modal', function (e) {
		
		$('#editContentModal #contentToEdit').redactor('core.destroy');
		
	})
	    
})


function savePage(e) {
	
	closeStyleEditor();
	
	e.preventDefault();
	
	
	//delete all first
	
	for(x=0; x<=99; x++) {
		
		localStorage.removeItem("blocksElement"+x);
		localStorage.removeItem("blocksFrame"+x);
		
	}
	
	localStorage.removeItem("pageNames");
	
	pageCounter = 1;
	
	//frame stuff
	$('#pageList > ul').each(function(){
			
		theName = $(this).attr('id');
		
		var blocksElement = [];
		var blocksFrame = [];
		
		c = 0;
		
		$(this).find('li').each(function(){
			
			blocksElement[c] = $(this).html();
																			
			c++;
			
		})
		
		c = 0;
		
		$(this).find('iframe').each(function(){
			
			var attr = $(this).attr('data-sandbox');

			if (typeof attr !== typeof undefined && attr !== false) {
				
				theContents = $('#sandboxes #'+attr).contents().find( pageContainer );
			
			} else {
				
				theContents = $(this).contents().find( pageContainer );
				
			}
			
			
			//remove .frameCovers
				
			theContents.find('.frameCover').each(function(){
				$(this).remove();
			});
			
			
			//remove inline styling leftovers
			
			for( var key in editableItems ) {
				
				//alert('Key :'+key)
												
				theContents.find( key ).each(function(){
					
					//alert( "Data before: "+ $(this).attr('data-selector') );
					
					$(this).removeAttr('data-selector');
					
					//alert( "Data after: "+ $(this).attr('data-selector') );
					
					if( $(this).attr('style') == '' ) {
						$(this).removeAttr('style')
					}
					
				})
								
			}	
			for (i=0; i<editableContent.length; ++i) {
				
				$(this).contents().find( editableContent[i] ).each(function(){
					
					$(this).removeAttr('data-selector');
					
				})
									
			}
							
			blocksFrame[c] = theContents.html();
																			
			c++;
			
		})
		
		//delete old
		localStorage.removeItem("blocksElement"+pageCounter);
					
		localStorage['blocksElement'+pageCounter] = JSON.stringify(blocksElement);
		localStorage['blocksFrame'+pageCounter] = JSON.stringify(blocksFrame);
		
		pageCounter++;
	
	});
	
	//page names
	
	var pageNames = [];
	
	c = 0;
	
	$('ul#pages li:not(#newPageLI)').each(function(){
		
		pageNames[c] = $(this).find('a').text();
		
		c++;
		
	})
	
	localStorage['pageNames'] = JSON.stringify(pageNames);
	
	setPendingChanges(false)
	
}