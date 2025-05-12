# Overview
This branch was created to show how all the components can be implemented.

<br>

### Component Props (Properties)
Components can have props, in basics props are inputs that can be passed into components.

<br>

# Components
Here is a list below of all components, and how to use each, as well as the props that each have available.

<br>

## Icon
Icons provide enhanced accessibility, act as visual cues and improve navigation throughout interfaces.

### Usage 
Include `require_once "icon.php"` at the top of the php page.

```php
createInput(path, iconSize)
```

<br>

`path` is the path to your icon. `path` is of type `string`.

<br>

`iconSize` is an enum and can be the following:
1. `iconSize::SMALL-4` - 8px
   
2. `iconSize::SMALL-2` - 12px

3. `iconSize::SMALL-3` - 16px
   
4. `iconSize::SMALL-1` - 20px

5. `iconSize::NORMAL` - 24px
   
6. `iconSize::LARGE` - 32px

7. `iconSize::EXTRALARGE` - 40px

<br>

---

<br>

## Alert
Alerts provide feedback based on a previous action within an interface.

### Usage
Include `include "alert.php"` at the top of the php page.

```php
createAlert(AlertType, message)
```
<br>

`AlertType` is an enum and can be the following: 
1. `AlertType::Success`
   
2. `AlertType::Info`
   
3. `AlertType::Warning`
   
4. `AlertType::Danger`

<br>

`message` is a string.

<br>

---

<br>

## Avatar
An avatar is a graphical illustration of a user, or multiple users within an interface.

### Usage
Include `include "avatar.php"` at the top of the php page.

```php
createAvatar(AvatarSize, name, menuOptions)
```

<br>

`AvatarSize` is an enum and can be the following:
1. `AvatarSize::Small`
   
2. `AvatarSize::Normal`
   
3. `AvatarSize::Large`

<br>

`name` is a string, if a name is not passed in it will just have the avatar only.

<br>

`menuOptions` is an key-value pair array, where the key is an icon path, and the value is the text, here is an example:
 
```php
array(
    "/icons/sign-out.svg" => "Sign out",
    "/icons/arrows.svg" => "Switch account",
    "/icons/profile.svg" => "View profile"
    ...
)
```

###### Please note that if there is no array specified, or there is an empty array declared no menu will be displayed.

<br>

---

<br>

## Badge 
Badges are used to display statuses, notifications or other information that needs to stand out.

### Usage 
Include `include "badge.php"` at the top of the php page.

```php
createBadge(BadgeSize, icon, Color, message)
```

<br>

`BadgeSize` is an enum and can be the following:
1. `BadgeSize::Small`
   
2. `BadgeSize::Normal`
   
3. `BadgeSize::Large`

<br>

`icon` is a string, if no string is provided there will be no icon.

<br>

`BadgeColor` is an enum and can be the following:
1. `BadgeColor::Grey`
   
2. `BadgeColor::Red`
   
3. `BadgeColor::Green`
   
4. `BadgeColor::Amber`
   
5. `BadgeColor::Blue`
   
6. `BadgeColor::Purple`
   
7. `BadgeColor::Pink`
   
8. `BadgeColor::Teal`
   
9.  `BadgeColor::Brown`
    
10. `BadgeColor::Orange`

<br>

`message` is a string, badges must have a message.

<br>

---

<br>

## Button
Buttons are graphical component that give users a clickable area.

### Usage 
Include `include "badge.php"` at the top of the php page.

```php
createButton(ButtonSize, ButtonVariety, ButtonColor, icon, message, type)
```

<br>

`ButtonSize` is an enum and can be the following:
1. `ButtonSize::Small`
   
2. `ButtonSize::Normal`
   
3. `ButtonSize::Large`

<br>

`ButtonVariety` is an enum and can be the following:
1. `ButtonVariety::Filled`
   
2. `ButtonVariety::Shaded`
   
3. `ButtonVariety::Plain`
   
4. `ButtonVariety::Warning`
   
5. `ButtonVariety::Danger`

<br>

`ButtonColor` is an enum and can be the following:
1. `ButtonColor::Grey`
   
2. `ButtonColor::Red`
   
3. `ButtonColor::Green`
   
4. `ButtonColor::Amber`
   
5. `ButtonColor::Blue`
   
6. `ButtonColor::Purple`
   
7. `ButtonColor::Pink`
   
8. `ButtonColor::Teal`
   
9.  `ButtonColor::Brown`
    
10. `ButtonColor::Orange`

<br>

`icon` is a string, if no icon is provided the icon will not be displayed

<br>

`message` is a string, buttons must have messages

<br>

`type` is a string, buttons can be `submit` or a regular `'button'`

<br>

---

<br>

## Card (WIP)
DESCRIPTION

### Usage 
Include `include "card.php"` at the top of the php page.

```php
createCard()
```

<br>

---

<br>

## Footer
Buttons are graphical component that give users a clickable area.

### Usage 
Include `require "footer.php"` at the top of the php page.

```php
createFooter()
```
######  Note that when you use the footer component make sure to add it within the html and body elements, the footer does not come with ending html/body tags.

<br>

---

<br>

## Topbar (Header)
The topbar is one of the main sources of navigation throughout interfaces.

### Usage 
Include `require "topbar.php"` at the top of the php page.

```php
createTopbar(TopbarType, menuOptions, logo, logoText)
```

<br>

`TopbarType` is an enum and can be the following:
1. `TopbarType::Singular` - The main navigation for websites.
   
2. `TopbarType::Seperated` - The main navigation for web applications.

<br>

`menuOptions` is an array of MenuOption (class) instances. This means to create a new menu option within the top bar can do the following:
 
```php
array(
        new MenuOption('jobs.svg', IconSize::NORMAL, 'Jobs', 'jobs.php'),
        new MenuOption('apply.svg', IconSize::NORMAL, 'Apply', 'apply.php'),
        new MenuOption('about.svg', IconSize::NORMAL, 'About', 'about.php'),
    ...
)
```

Writing `new MenuOption(icon, $iconSize, text, href)` creates a new menu option within the topbar.

<br>

`logo` is an icon path (string), and `logoText` is the text for the logo. Please note that logoText will not appear for seperated topbars.

<br>

---

<br>

## Input
Input is a simple text box containing minimal characters.

### Usage 
Include `include "input.php"` at the top of the php page.

```php
createInput(type, name, maxLength, size, placeholder, pattern, isRequired, disabled)
```

<br>

All of these props above act the same as any regular input field prop.

<br>

---

<br>