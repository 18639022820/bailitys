@extends('layouts.app')
@section('title')
  首页
@endsection
@section('link')
@endsection
@section("content")
   
{{--  @include('admin.index') --}}

   回复回复
<form action="{{URL::to('discuz/saveaddrerelay')}}" method="post" class="zhuce"> 
   主贴id
   <input type="text" name="topid"><br/>
   主贴人的topuserid
   <input type="text" name="topuserid"><br/>
   主贴人的昵称 topusername
   <input type="text" name="topusername"><br/>
       
   回复人userid      <input type="text" name="userid"><br/>
   回复人 username    <input type="text" name="username"><br/>  
   回复内容 content<input type="text" name="content"><br/> 

   xmap   <input type="text" name="xmap"><br/>

   ymap  <input type="text" name="ymap"><br/>

    province  <input type="text" name="province"><br/>
    city      <input type="text" name="city"><br/>
    district  <input type="text" name="district"><br/>
    replaytopid回复那个回复
    <input type="text" name="replaytopid"><br/>
  <input type="submit"  value="回复主贴"><br/>
 </form>

//huifu tiezi 
<form action="{{URL::to('discuz/savereplytop')}}" method="post" class="zhuce"> 
   主贴id
   <input type="text" name="topid"><br/>
   主贴人的topuserid
   <input type="text" name="topuserid"><br/>
   主贴人的昵称 topusername
   <input type="text" name="topusername"><br/>
       
   回复人userid      <input type="text" name="userid"><br/>
   回复人 username    <input type="text" name="username"><br/>  
   回复内容 content<input type="text" name="content"><br/> 

   xmap   <input type="text" name="xmap"><br/>

   ymap  <input type="text" name="ymap"><br/>

    province  <input type="text" name="province"><br/>
    city      <input type="text" name="city"><br/>
    district  <input type="text" name="district"><br/>

  <input type="submit"  value="回复主贴"><br/>
 </form>




发布帖子
<form action="{{URL::to('discuz/savetop')}}" method="post" class="zhuce"> 
 content内容
   <input type="text" name="content"><br/>
       img
   <input type="text" name="img"><br/>
       
    xmap      <input type="text" name="xmap"><br/>
    ymap      <input type="text" name="ymap"><br/>
    province  <input type="text" name="province"><br/>
    city      <input type="text" name="city"><br/>
    district  <input type="text" name="district"><br/>
  username<input type="text" name="username"><br/>
  <input type="submit"  value="社区保存"><br/>
 </form>
<hr/>






  保存用户信息
  <form action="{{URL::to('saveuseinfo')}}" method="post" class="zhuce">
  
       用户名 
   <input type="text" name="username">
   <hr/>
       tele
   <input type="text" name="tele"><hr/>
       logo
   <input type="text" name="logo"><hr/>
      nickname
  <input type="text" name="nickname"><hr/>
  <input type="submit" name="measurtime"><hr/>
   </form>





		 注册
<form action="{{URL::to('regist')}}" method="post" class="zhuce">
  
  		 用户名 
   <input type="text" name="username">
   <hr/>
   		 密码
   <input type="text" name="password"><hr/>
     	 手机号码
   <input type="text" name="tele"><hr/>
   邀请码
   <input type = "text" name ="invitecode"/><hr/>
   <input type="submit" name="measurtime"><hr/>
   </form>

   
   		 管理员注册
<form action="{{URL::to('addadmin')}}" method="post" class="zhuce">
  
  		 账号 
   <input type="text" name="username">
   <hr/>
   		 密码
   <input type="text" name="password"><hr/>
     	 级别
   <input type="text" name="type"><hr/>
   <input type="submit" name="measurtime"><hr/>
   </form>


    提交血糖
<form action="{{URL::to('bloodparameter/bloodsuga')}}" method="post" class="zhuce">
    范围
    <input type="text" name="range">
   <hr/>测试时间
   <input type="text" name="measurtime"><hr/>
   备注
    <input type="text" name="mark"><hr/>
   
   <button>保存</button>
   </form>
@endsection 
@section("footer") 
@endsection 