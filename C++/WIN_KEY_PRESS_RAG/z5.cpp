

int main(int argc, char const *argv[]) {
  
  const int KEYEVENT_KEYUP = 0x02;
  
  keybd_event(VK_CONTROL,0,0,0);              // press the CTRL key
  keybd_event(VK_ESCAPE,0,0,0);              // press the Esc key
  keybd_event(VK_ESCAPE,0,KEYEVENT_KEYUP,0); // let up the Esc key
  keybd_event(VK_CONTROL,0,KEYEVENT_KEYUP,0); // let up the CTRL key
  
  return 0;
}
