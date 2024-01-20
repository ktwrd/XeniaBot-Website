#!/usr/bin/env python
from datetime import datetime
from dateutil import parser

now = datetime.now()

print('PostId name (default: YYYYMMDD)')
name = input('> ')
if len(name) < 1:
    name = now.strftime('%Y%m%d')
print('name: %s\n' % name)

def get_subject():
    print('Subject (required)')
    s = input('> ')
    if len(s) < 1:
        print('--- Subject IS required ---')
        return get_subject()
    else:
        return s
subject = get_subject()

def get_hide_state():
    print('Hide state (0: show, 1: does not exist, 2: access via url only)')
    h = str(input('> '))
    if h != '0' and h != '1' and h != 2:
        print('--- Hide state IS required ---')
        return get_hide_state()
    else:
        return h
def get_timestamp():
    print('Timestamp')
    h = str(input('> '))
    if h is None:
        h = ''
    if len(h) < 1:
        return now
    else:
        prs = parser.parse(h)
        return prs
hide_state = get_hide_state()
target_ts = get_timestamp()

_target_basename = './web/blog_posts/%s' % name

fphp = open('%s.php' % _target_basename, 'x')
fphp.write('\n'.join([
'<?php',
'',
'$generate_blog_post = array(',
'    \'subject\' => \'%s\',' % subject.replace('\'', '\\\''),
'    \'description\' => \'\',',
'    ' + ('\'created_at\' => mktime(%s),' % target_ts.strftime(' %H, %M, %S, %m, %d, %Y').strip(' 0')).strip('mktime( '),
'    \'hide_state\' => %s,' % hide_state,
'    \'tags\' => array()',
');',
'',
'?>'
]))
fphp.close()

fmd = open('%s.md' % _target_basename, 'x')
fmd.write('')
fmd.close()
    