<div>
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function() {
            const {{ $holderId }}editor = new window.EditorJS({
                /**
                 * Id of Element that should contain Editor instance
                 */
                holder: '{{ $holderId }}',

                @if(!is_null($tools) && is_array($tools))
                    tools: {
                        @if(in_array('paragraph', $tools) || in_array('paragraph-with-alignment', $tools))
                            paragraph: EditorJSParagraph,
                        @endif
                        @if(in_array('header', $tools) || in_array('header-with-alignment', $tools) || in_array('header-with-anchor', $tools))
                            header: {
                                class: EditorJSHeader,
                                config: {
                                    placeholder: 'Enter a header',
                                }
                            },
                        @endif
                        @if(in_array('quote', $tools))
                            quote: EditorJSQuote,
                        @endif
                        @if(in_array('warning', $tools))
                            warning: EditorJSWarning,
                        @endif
                        @if(in_array('delimiter', $tools))
                            delimiter: EditorJSDelimiter,
                        @endif
                        @if(in_array('alert', $tools))
                            alert: EditorJSAlert,
                        @endif
                        @if(in_array('toggle-block', $tools))
                            toggle: EditorJSToggleBlock,
                        @endif
                        @if(in_array('list', $tools))
                            list: EditorJSList,
                        @endif
                        @if(in_array('nested-list', $tools))
                            list: EditorJSNestedList,
                        @endif
                        @if(in_array('checklist', $tools))
                            checklist: EditorJSChecklist,
                        @endif
                    }
                @endif
            });
        });
    </script>

    <!-- LiveControls.Editor -->
    <div class="bg-white rounded-lg">
        <div id="{{ $holderId }}"></div>
        <button class="{{ config('livecontrols_editor.clear_button_style', 'bg-red-700 text-white rounded p-4') }}">Clear</button>
        <button class="{{ config('livecontrols_editor.save_button_style', 'bg-green-700 text-white rounded p-4') }}">Save</button>
    </div>
    <!-- /LiveControls.Editor -->
</div>