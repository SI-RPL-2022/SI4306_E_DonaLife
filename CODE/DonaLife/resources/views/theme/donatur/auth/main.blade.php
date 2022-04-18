<!DOCTYPE html>
<html lang="en">
	@include('theme.donatur.auth.head')
	<body id="kt_body">
		<div class="d-flex flex-column flex-root">
				<div class="d-flex flex-column flex-lg-row-fluid py-10">
					<div class="d-flex flex-center flex-column flex-column-fluid">
						{{$slot}}
					</div>
				</div>
			</div>
		</div>
    </body>
    @include('theme.donatur.auth.js')
    @yield('custom_js')
</html>