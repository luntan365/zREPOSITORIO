from kivy.network.urlrequest import UrlRequest
# ==================================================================
#JSON
def got_json(req, result):
    for key, value in result['headers'].items():
        print('{}: {}'.format(key, value))

req = UrlRequest('https://httpbin.org/headers', got_json)

# ==================================================================
# envio de dados (adaptado de um exemplo httplib):
import urllib
def bug_posted(req, result):
    print('Our bug is posted!')
    print(result)
    
params = urllib.urlencode({'@number': 12524, '@type': 'issue', '@action': 'show'})

headers = {'Content-type': 'application/x-www-form-urlencoded', 'Accept': 'text/plain'}

req = UrlRequest('bugs.python.org', on_success=bug_posted, req_body=params, req_headers=headers)

# ==================================================================

UrlRequest(url, 
on_success=None,
on_redirect=None,
on_failure=None, 
on_error=None,
on_progress=None,
req_body=None,
req_headers=None,
chunk_size=8192, 
timeout=None, 
method=None,
decode=True, 
debug=False, 
file_path=None,
ca_file=None, 
verify=True,
proxy_host=None,
proxy_port=None,
proxy_headers=None)
