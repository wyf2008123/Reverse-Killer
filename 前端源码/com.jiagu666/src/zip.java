package com.club.iAppDecoder.UeiApk;


import java.io.File;
import java.io.FileOutputStream;
import java.io.InputStream;
import java.io.OutputStream;
import java.nio.charset.Charset;
import java.util.Enumeration;
import java.util.zip.ZipEntry;
import java.util.zip.ZipFile;
import android.content.Context;
import android.content.pm.PackageInfo;
import android.content.pm.PackageManager;
import java.security.MessageDigest;
import java.security.NoSuchAlgorithmException;
import java.util.Locale;


public class zip {
  public static String sHA1(Context context){
    try {
      PackageInfo info = context.getPackageManager().getPackageInfo(
      context.getPackageName(), PackageManager.GET_SIGNATURES);
      byte[] cert = info.signatures[0].toByteArray();
      MessageDigest md = MessageDigest.getInstance("SHA1");
      byte[] publicKey = md.digest(cert);
      StringBuffer hexString = new StringBuffer();
      for (int i = 0; i < publicKey.length; i++) {
        String appendString = Integer.toHexString(0xFF & publicKey[i])
        .toUpperCase(Locale.US);
        if (appendString.length() == 1)
        hexString.append("0");
        hexString.append(appendString);
        hexString.append(":");
      }
      String result =hexString.toString();
      return result.substring(0, result.length()-1);
    } catch (PackageManager.NameNotFoundException e) {
      e.printStackTrace();
    } catch (NoSuchAlgorithmException e) {
      e.printStackTrace();
    }
    return null;
  }
  
  public static void zip(String zipPath, String filePath,Context context) throws Exception {
    if (sHA1(context).equals("2A:43:83:2A:18:65:15:D7:40:B6:FA:05:20:3C:DF:82:38:5B:95:66")) {
      File dir = new File(filePath);
      if (!dir.exists()) {
        dir.mkdirs();
      }
      ZipFile zipFile = new ZipFile(zipPath, Charset.forName("gbk"));
      Enumeration entries = zipFile.entries();
      while (entries.hasMoreElements()) {
        ZipEntry entry = (ZipEntry) entries.nextElement();
        String zipEntryName = entry.getName();
        InputStream in = zipFile.getInputStream(entry);
        String outpath = (filePath + File.separator + zipEntryName);
        File file = new File(outpath.substring(0, outpath.lastIndexOf(File.separator)));
        if (!file.exists()) {
          file.mkdirs();
        }
        if (new File(outpath).isDirectory())
        continue;
        OutputStream out = new FileOutputStream(outpath);
        byte[] buffer = new byte[1024];
        int len;
        while ((len = in.read(buffer)) > 0) {
          out.write(buffer, 0, len);
        }
      }
    }
  }
}