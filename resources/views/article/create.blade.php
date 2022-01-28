@extends('template.master')
@section('header-js')
     <script async charset="utf-8" src="//cdn.embedly.com/widgets/platform.js"></script>
@endsection
@section('content')
            <!-- Main content -->
        <section id="pjax-container" class="content container-fluid">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-pencil-square-o"></i>&nbsp;Editorial - Create Article</h3>
        
                    <div class="pull-right">
                        <button type="button" class="btn_close btn btn-sm btn-danger" data-idle="Close"
                            data-process="Closing..." data-redirect="https://editor.promediateknologi.com/hops-id/index/1"><i
                                class="fa fa-close"></i> Close</button>
                    </div>
        
                </div>
        
                <div class="row">
                    <div class="col-md-8">
                        <div class="box-header with-border">
                            <div class="form-group">
                                <input type="hidden" id="input_id" name="input_id" value="">
                                <input type="hidden" id="site_id" name="site_id" value="294">
                                <input type="hidden" id="basket_id" name="basket_id" value="1">
                                <label>Title</label>
                                <input type="text" id="input_title" name="input_title" class="form-control"
                                    placeholder="Enter Title..." value="" maxlength="110">
        
                            </div>
                            <div class="form-group">
                                <label>Content</label>
                                <textarea id="editor" name="textarea_content" class="form-control" rows="60"
                                    placeholder="Enter Content..."></textarea>
                            </div>
                            <div class="form-group">
                                <label>Related</label>
                                <select id="select_related" name="select_related" class="form-control select2"
                                    multiple="multiple" data-placeholder="Select a related" style="width: 100%;">
                                </select>
                                <button type="button" class="btn btn-sm btn-default btn-dialog" data-title="Related Article"
                                    data-url="https://editor.promediateknologi.com/hops-id/index/elastic/2?popup=1&module=related"><i
                                        class="fa fa-plus"></i> Add/Select more</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="box-header with-border">
        
                            <!-- <div class="small-box bg-red seo_score">
                            <div class="inner">
                              <p>SEO METER</p>
                              <h3><span id="seo_score">0</span><sup style="font-size: 20px">%</sup></h3>
                            </div>
                        </div> -->
        
                            <div class="form-group">
                                <label>Rubrik</label>
                                <select id="select_section_id" name="select_section_id" class="form-control select2"
                                    data-placeholder="Select a Section" style="width: 100%;">
                                    <option value="4456">Trending</option>
                                    <option value="4457">Unik</option>
                                    <option value="4458">Hot</option>
                                    <option value="4459">Fit</option>
                                    <option value="4460">Hobi</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea id="textarea_description" name="textarea_description" class="form-control" rows="3"
                                    maxlength="140"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Tag</label>
                                <select id="select_tag" name="select_tag" class="form-control select2" multiple="multiple"
                                    data-placeholder="Select a Tag" style="width: 100%;">
                                </select>
                                <button type="button" class="btn btn-sm btn-default btn-dialog" data-title="Tag"
                                    data-url="https://editor.promediateknologi.com/tag/index?popup=1&module=article"><i
                                        class="fa fa-plus"></i> Add/Select more</button>
                            </div>
                            <div class="form-group">
                                <label>Source</label>
                                <select id="select_source" name="select_source" class="form-control select2" multiple="multiple"
                                    data-placeholder="Select a Source" style="width: 100%;">
                                </select>
                                <button type="button" class="btn btn-sm btn-default btn-dialog" data-title="Source"
                                    data-url="https://editor.promediateknologi.com/source/index?popup=1&module=article"><i
                                        class="fa fa-plus"></i> Add/Select more</button>
                            </div>
                            <div class="form-group">
                                <label>Author</label>
                                <select id="select_author" name="select_author" class="form-control select2" multiple="multiple"
                                    data-placeholder="Select a author" style="width: 100%;">
                                    <option value="7811" selected="selected">Ali Budi Purnomo</option>
                                </select>
                                <button type="button" class="btn btn-sm btn-default btn-dialog" data-title="Author"><i
                                        class="fa fa-plus"></i> Add/Select more</button>
                            </div>
                            <div class="form-group">
                                <label>Topic</label>
                                <select id="select_topic" name="select_topic" class="form-control select2" multiple="multiple"
                                    data-placeholder="Select a Topic" style="width: 100%;">
                                </select>
                                <button type="button" class="btn btn-sm btn-default btn-dialog" data-title="Topic"
                                    data-url="https://editor.promediateknologi.com/hops-id_topic/index/?popup=1&module=article&site_id=294"><i
                                        class="fa fa-plus"></i> Add/Select more</button>
                            </div>
                            <div class="form-group">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" id="input_allow_comment" name="input_allow_comment" value="1"
                                            checked>
                                        Allow Comment
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" id="input_allow_wp" name="input_allow_wp" value="1" checked>
                                        View in welcome page
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" autocomplete="off" id="input_schedule" name="input_schedule"
                                            value="1">
                                        Schedule
                                    </label>
                                </div>
                                <div class="input-group date schedule-wrap">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right" id="input_schedule_date" value="">
                                </div>
                            </div>
                        </div>
                        <!-- <div class="box-header with-border">
                         <div class="form-group">
                            <label>Script Tracking</label>
                            <textarea rows="10" class="form-control pull-right" id="input_script_tracking"></textarea>
                        </div>
                    </div>  -->
                    </div>
                </div>
            </div>
        
            <div class="box box-default">
                <div class="box-body">
                    <button type="button" class="btn_publish btn btn-sm btn-success"
                        data-idle="<i class='fa fa-send'></i> Publish" data-process="Publishing..."
                        data-redirect="https://editor.promediateknologi.com/hops-id/index/2"><i class="fa fa-send"></i>
                        Publish</button>
                    <button id="btn-save" type="button" class="btn_save btn btn-sm btn-default"
                        data-idle="<i class='fa fa-save'></i> Save" data-process="Saving..."><i class="fa fa-save"></i>
                        Save</button>
                    <div class="pull-right">
                        <button type="button" class="btn_close btn btn-sm btn-danger" data-idle="Close"
                            data-process="Closing..." data-redirect="https://editor.promediateknologi.com/hops-id/index/1"><i
                                class="fa fa-close"></i> Close</button>
                    </div>
                </div>
            </div>
            <div id="photo-modal" class="modal fade">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-body overlay-wrapper">
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <img id="img-crop" class="img-responsive img-thumbnail">
                                    </div>
                                    <div class="form-group">
                                        <button id="btn-crop" type="button" name="button" class="btn btn-default btn-sm"><i
                                                class="fa fa-crop"></i> <span>Crop</span></button>
                                        <div class="pull-right">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" id="photo-watermark-modal" value="1"> Watermark
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <input type="hidden" id="photo-id-modal" value="">
                                        <label>Caption</label>
                                        <input autocomplete="off" type="text" id="photo-caption-modal" class="form-control"
                                            value="">
                                    </div>
                                    <div class="form-group">
                                        <label>Author</label>
                                        <input autocomplete="off" type="text" id="photo-author-modal" class="form-control"
                                            value="">
                                    </div>
                                    <div class="form-group">
                                        <label>Credit</label>
                                        <input autocomplete="off" type="text" id="photo-credit-modal" class="form-control"
                                            value="">
                                    </div>
                                    <div class="form-group">
                                        <label>Source</label>
                                        <input autocomplete="off" type="text" id="photo-source-modal" class="form-control"
                                            value="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="button" name="button"
                                        class="btn btn-sm btn-primary btn-update-modal">Update</button>
                                    <div class="pull-right">
                                        <button type="button" name="button" class="btn btn-sm btn-default" class="close"
                                            data-dismiss="modal" aria-label="Close">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
            <!-- /.content -->
     @section('js')
        <script src="https://cdn.ckeditor.com/ckeditor5/31.1.0/classic/ckeditor.js"></script>
        @include('template.ckeditor')
    @endsection
@endsection