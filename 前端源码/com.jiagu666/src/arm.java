package com.club.iAppDecoder.UeiApk;
import android.annotation.SuppressLint;
import android.app.Application;
import android.app.Instrumentation;
import android.content.Context;
import android.content.pm.ApplicationInfo;
import android.content.res.AssetManager;
import android.content.res.Resources;
import android.os.Build;
import android.util.ArrayMap;
import java.io.BufferedInputStream;
import java.io.ByteArrayInputStream;
import java.io.ByteArrayOutputStream;
import java.io.File;
import java.io.FileOutputStream;
import java.io.InputStream;
import java.lang.ref.WeakReference;
import java.lang.reflect.Field;
import java.lang.reflect.InvocationTargetException;
import java.lang.reflect.Method;
import java.security.MessageDigest;
import java.security.NoSuchAlgorithmException;
import java.util.ArrayList;
import java.util.Arrays;
import java.util.Collection;
import java.util.HashMap;
import java.util.Map;
import javax.crypto.Cipher;
import javax.crypto.CipherOutputStream;
import javax.crypto.spec.IvParameterSpec;
import javax.crypto.spec.SecretKeySpec;

import java.lang.*;

// java源码需要通过 原生编译打包 才有效
// 可以通过cls()/javanew()/java()/javax()/javacb()等代码来调用此文件的方法代码

public class arm {
  
 
  public static byte[] decrypt(byte[] data) {
    try {
      ByteArrayInputStream inputStream = new ByteArrayInputStream(data);
      ByteArrayOutputStream outputStream = new ByteArrayOutputStream();
      String p = md5("Armadillo").substring(8, 24);
      IvParameterSpec zeroIv = new IvParameterSpec(p.getBytes());
      SecretKeySpec key1 = new SecretKeySpec(p.getBytes(), "AES");
      Cipher cipher = Cipher.getInstance("AES/CBC/PKCS5Padding");
      cipher.init(2, key1, zeroIv);
      CipherOutputStream cipherOutputStream = new CipherOutputStream(outputStream, cipher);
      byte[] buffer = new byte[1024];
      while (true) {
        int r = inputStream.read(buffer);
        if (r >= 0) {
          cipherOutputStream.write(buffer, 0, r);
        } else {
          cipherOutputStream.close();
          return outputStream.toByteArray();
        }
      }
    } catch (Exception e) {
      e.printStackTrace();
      return null;
    }
  }
  
  public static String md5(String string) {
    try {
      MessageDigest md5 = MessageDigest.getInstance("MD5");
      byte[] bytes = md5.digest(string.getBytes());
      String result = "";
      for (byte b : bytes) {
        String temp = Integer.toHexString(Integer.parseInt(Integer.toOctalString(b & 255)));
        result = result + temp;
      }
      return result;
    } catch (NoSuchAlgorithmException e) {
      e.printStackTrace();
      return "";
    }
  }
}