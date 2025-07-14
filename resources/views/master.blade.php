<!DOCTYPE html>
<html {{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ config('locales.languages')[app()->getLocale()]['rtl_support'] }}">
<head>
    @include('layouts.header.head')
</head>
<body>
  @include('layouts.navbar')

  @yield('content')

  @include('layouts.footer.footer')
  
  
<script>
	document.addEventListener('contextmenu', (e) => e.preventDefault());

function ctrlShiftKey(e, keyCode) {
  return e.ctrlKey && e.shiftKey && e.keyCode === keyCode.charCodeAt(0);
}

document.onkeydown = (e) => {
  // Disable F12, Ctrl + Shift + I, Ctrl + Shift + J, Ctrl + U
  if (
    event.keyCode === 123 ||
    ctrlShiftKey(e, 'I') ||
    ctrlShiftKey(e, 'J') ||
    ctrlShiftKey(e, 'C') ||
    (e.ctrlKey && e.keyCode === 'U'.charCodeAt(0))
  )
    return false;
};
	</script>
	
</body>
</html>
