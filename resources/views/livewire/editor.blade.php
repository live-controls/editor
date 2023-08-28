<div>
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function() {
            const editor = new window.EditorJS({
                /**
                 * Id of Element that should contain Editor instance
                 */
                holder: '{{ $holderId }}',

                @if(!is_null($tools) && is_array($tools))
                    tools: @js($tools)
                @endif
            });
        });
    </script>
</div>