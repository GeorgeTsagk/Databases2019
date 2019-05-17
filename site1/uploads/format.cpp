#include <iostream>
#include <cstring>

using namespace std;

char word[30][20],read[20],x;
bool fword=false ,fline=false,en=false,t=false;
int space [29],wc,ac=0,len,di=0,mod=0,y;

int rw(){
  int i=0;
  while ((x!= ' ')&&(y!=EOF)&&(x !='\n')){
    read[i]=x;
    i++;
    x=getchar();
    y=x;
  }
  if(y==EOF)
    en=true;
  return i;
}


void printline(){

  int j=0,k=0;
  wc++;
  while (k<wc-1){
    j=0;
    while (word[k][j]!=0){
      cout<< word [k][j];
      j++;
    }
    for (y=0; y<space[k];y++)
      cout<< " " ;
    k++;
    }
  j=0;
  while (word[k][j]!=0){
    cout<< word [k][j];
    j++;
  }


 cout<<endl;
}


void spcalc(){
  int i=0;
  //cout<<"i m here\n"  ;
  for(i=0;i<29;i++)
    space[i]=1;
  if (ac!=60){
    ac-=len;
    wc--;
    ac--;
    di=(60-(ac-(wc)))/(wc);
    mod=(60-(ac - (wc )))%(wc);
    di--;
    //mod++;
    if(di!=0)
      for(i=0;i<wc;i++)
        space[i]+=di;
    if (mod!=0){
     for(i=(wc-1);i >= 0 && i>(wc-1-mod);i--)
        space[i]++;
    }
  }
}



int main() {
  int i=0,j=0;
  wc=0;
  memset(read,0,20);
  for(i=0;i<31;i++)
    for(j=0;j<20;j++)
      word[i][j]=0;
  x=getchar();
  y=x;
  while (en==false){
    len=rw();
    if (len==0)goto next;
    ac+=len;
    if (ac<=60){
      for (i=0;i<len;i++){
        word[wc][i]=read[i];
      }
      memset(read,0,20);
      fword=false;
      wc++;
      if(ac==60) {
        wc--;
        fline=true;
        fword=false;

      }
    }
   else {
      fword=true;
      fline=true;
    }
    if (fline){
      i=0;
      spcalc();
      //cout<<"wc "<<wc<<endl;
      //while(a[wc])
      printline();
      wc=0;
      fline=false;
      ac=0;
      for(i=0;i<30;i++)
        for(j=0;j<20;j++)
           word[i][j]=0;
      if (fword){
        for(i=0;i<len;i++){
          word[wc][i]=read[i];
        }

        fword=false;
        ac+=len;
        wc++;
        ac++;
      }

    }
    else ac++;
next:
    x=getchar();
    y=x;
  }

  if (ac!=0){
    for(i=0;i<wc-1;i++)
      space[i]=1;
    for(i=wc-1;i<29;i++)
      space[i]=0;
    printline();
  }
}


