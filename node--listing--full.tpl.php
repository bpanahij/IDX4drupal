<?php 
/*
    This file is part of FoxyIDX.

    Foobar is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    FoxyIDX is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with Foobar.  If not, see <http://www.gnu.org/licenses/>.

    Author: Brian P Johnson
    Contact: brian@pjohnson.info
*/


$address = $content["field_167"][0]['#markup']." ".$content["field_164"][0]['#markup']." ".$content["field_33"][0]['#markup']." ".$content["field_1209"][0]['#markup']." ".$content["field_196"][0]['#markup']; 
?>
<style>
	.content {
	width: 100%;
	}
	#property {

	}
	.content-middle {
	position: relative;
	}
	#left_column {
	float: left;
	width: 450px;
	padding: 10px;
	}
	.right_column {
	position: absolute;
	top: 0px;
	right: 0px;
	float: left;
	width: 450px;
	padding: 10px;
	}
	#descriptions {
	width: 920px;
	display: block;
	float: left;
	padding: 10px;
	}
	#map_canvas {
	position: absolute;
	border: 1px solid #888;
	border-right: none;
	box-shadow: 0px 0px 1px 1px #888;
	top: 200px;
	right: 0px;
	width: 450px;
	}
	.gallery-slides {
	width: 800px !important;
	height: 600px !important;
	}
	.gallery-slide img {
	width: 800px;
	}
	.galleryview {
	border: 1px solid #888;
	box-shadow: 0px 6px 14px 3px #888;
	width: 800px;
	background: #444;
	}
	.gallery-thumbs {
	background: #444;
	}	
	.gallery-thumbs .wrapper {
	background: #444 !important;
	border: none !important;
	}	
	.node-listing {
	border: 1px solid #888;
	background: #FFF;
	box-shadow: 0px 0px 18px 5px #888;
	}
</style>
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
	<div class="content"<?php print $content_attributes; ?>>
		<div id="property" address="<?php echo $address;?>">
			<div id="left_column">
				<h3>
					<?php 
					print $address;
					?>
					<br/>
				</h3>
				<h4>
					<?php 
					print $content["field_169"][0]['#markup']; 
					?>
				</h4>
				<div>
					<?php 
					print $content["field_135"][0]['#markup']; 
					?>
				</div>
				<div>
					<strong>Call <emphasis><?php echo variable_get('foxyidx_agent_name', '')." at ".variable_get('foxyidx_agent_number', ''); ?></emphasis> to see this home.</strong>
				</div>
				<div>
					<table id="listing">
						<tbody>
							<tr>
								<td><b>Address</b></td>
								<td>
									<?php 
									echo $content["field_167"][0]['#markup']." ".$content["field_164"][0]['#markup']; 
									?>
								</td>
							</tr>
							<tr>
								<td><b>Subdivision</b></td>
								<td>
									<?php 
									print $content["field_169"][0]['#markup'];
									?>
								</td>
							</tr>
							<tr>
								<td><b>City</b></td>
								<td>
									<?php 
									print $content["field_33"][0]['#markup'];
									?>
								</td>
							</tr>
							<tr>
								<td><b>County</b></td>
								<td>
									<?php print $content["field_43"][0]['#markup'];?>
								</td>
							</tr>
							<tr>
								<td><b>Price</b></td>
								<td>$<?php print $content["field_77"][0]['#markup'];?>
								</td>
							</tr>
							<tr>
								<td><b>Square Feet</b></td>
								<td>
									<?php 
									print $content["field_159"][0]['#markup'];
									?>
								</td>
							</tr>
							<tr>
								<td><b>Year Built</b></td>
								<td>
									<?php 
									print $content["field_193"][0]['#markup'];
									?>
								</td>
							</tr>
							<tr>
								<td><b>Lot Size (Acres)</b></td>
								<td>
									<?php 
									print $content["field_2"][0]['#markup'];
									?>
								</td>
							</tr>
							<tr>
								<td><b>Stories</b></td>
								<td>
									<?php 
									print $content["field_162"][0]['#markup']; 
									?>
								</td>
							</tr>
							<tr>
								<td><b>Bedrooms</b></td>
								<td>
									<?php 
									print $content["field_24"][0]['#markup']; 
									?>
								</td>
							</tr>
							<tr>
								<td><b>Baths</b></td>
								<td>
									<?php 
									print $content["field_1375"][0]['#markup']; 
									?>
								</td>
							</tr>
							<tr>
								<td><b>Main Level Beds</b></td>
								<td>
									<?php 
									print $content["field_426"][0]['#markup']; 
									?>
								</td>
							</tr>
							<tr>
								<td><b>Half Baths</b></td>
								<td>
									<?php 
									print $content["field_422"][0]['#markup']; 
									?>
								</td>
							</tr>
							<tr>
								<td><b>Garage</b></td>
								<td>
									<?php 
									print $content["field_427"][0]['#markup']; 
									?>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div> <!--left column end-->
			<div class="right_column">
				<h3>Homes close to <?php print $content["field_167"][0]['#markup']; ?> <?php print $content["field_164"][0]['#markup']; ?></h3>
				<ul class="nearby">
				</ul>
				<smalltitle>
				<?php 
				print $content["field_167"][0]['#markup']; ?> <?php print $content["field_164"][0]['#markup']; ?> <?php print $content["field_33"][0]['#markup']; ?> <?php print $content["field_1209"][0]['#markup']; ?> <?php print $content["field_196"][0]['#markup']; ?>
				</smalltitle>
				<br>
				<div id="map_canvas">
				</div>
			</div>
			<div id="descriptions">
				<h4>
					<?php print $content["field_33"][0]['#markup']; ?> Real Estate MLS Description
				</h4>
				<h4>
					<?php print $address ?>
				</h4>		    
				<div id="narative">
					<p>
					<?php print $content["field_169"][0]['#markup']; ?> home is in the <?php print $content["field_141"][0]['#markup']; ?> and is served by <?php print $content["field_143"][0]['#markup']; ?> Elementary School, <?php print $content["field_147"][0]['#markup']; ?> Middle School, <?php print $content["field_145"][0]['#markup']; ?> Senior High School. <?php //print $content["field_134"][0]['#markup']; ?> The <?php print $content["field_177"][0]['#markup']; ?> estimated property tax for <?php print $content["field_167"][0]['#markup']; ?> <?php print $content["field_164"][0]['#markup']; ?> is $<?php print $content["field_171"][0]['#markup']; ?>.</p>
					<p>
					<?php print $content["field_167"][0]['#markup']; ?> <?php print $content["field_164"][0]['#markup']; ?> is listed by The <?php print $content["field_104"][0]['#markup']?>. <?php print $content["field_33"][0]['#markup']; ?> Real Estate information from the <?php print $content["field_33"][0]['#markup']; ?> Board of REALTORS® (alternatively, from MLS) for <?php echo variable_get('foxyidx_agent_name', ''); ?>. Neither the Board nor ACTRIS guarantees or is in any way responsible for its accuracy. All the real estate information you see for all <?php print $content["field_33"][0]['#markup']; ?> Homes for Sale is provided 'AS IS' and with all faults. This information is maintained by the Board or ACTRIS and may not reflect all real estate activity in the market. © Copyright 2011 Austin Central Texas Realty Information Services, Inc.]
					</p>
				</div>
				<div>
					<?php 
					print render($content['field_image']); 
					?>
				</div>
			</div>
		</div>
	</div>
