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
                        @if(array_key_exists('paragraph', $tools))
                            paragraph: EditorJSParagraph
                        @endif
                        @if(array_key_exists('header', $tools))
                            header: {
                                class: EditorJSHeader,
                                config: {
                                    placeholder: 'Enter a header',
                                }
                            }
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